<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Carbon\Carbon;

class BackupSystem extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';
    protected static ?string $navigationLabel = 'Backup Sistem';
    protected static ?string $title = 'Backup & Restore Sistem';
    protected static ?string $slug = 'backup-system';
    protected static string $view = 'filament.pages.backup-system';
    protected static ?string $navigationGroup = 'Backup Sistem';
    protected static ?int $navigationSort = 100;

    public $backupFile;

    public function mount()
    {
        // Check if directory exists, create if not
        if (!File::exists(storage_path('app/backups'))) {
            File::makeDirectory(storage_path('app/backups'), 0755, true);
        }
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('backupFile')
                ->label('Upload File Backup (.zip)')
                ->disk('local')
                ->directory('temp_restores')
                ->acceptedFileTypes(['application/zip', 'application/x-zip-compressed'])
                ->required()
                ->helperText('PERINGATAN: Restore akan menimpa data dan tampilan saat ini. Sistem akan otomatis melakukan backup sebelum restore.'),
        ];
    }

    public function downloadBackup()
    {
        $filename = 'backup-baak-' . Carbon::now()->format('Y-m-d-H-i-s') . '.zip';
        $zipPath = storage_path('app/backups/' . $filename);

        if ($this->createBackup($zipPath)) {
            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        Notification::make()
            ->title('Backup Gagal')
            ->danger()
            ->send();
    }

    public function restore()
    {
        $data = $this->form->getState();
        $uploadedPath = storage_path('app/' . $data['backupFile']);

        if (!File::exists($uploadedPath)) {
            Notification::make()->title('File tidak ditemukan')->danger()->send();
            return;
        }

        // 1. SAFETY: Auto-Backup Current State
        $safetyBackupName = 'pre-restore-backup-' . Carbon::now()->format('Y-m-d-H-i-s') . '.zip';
        $safetyBackupPath = storage_path('app/backups/' . $safetyBackupName);
        $this->createBackup($safetyBackupPath);

        // 2. Validate ZIP
        $zip = new ZipArchive;
        if ($zip->open($uploadedPath) === TRUE) {

            // Check for critical files
            if ($zip->locateName('database.sql') === false) {
                Notification::make()->title('Format Backup Tidak Valid (database.sql hilang)')->danger()->send();
                $zip->close();
                return;
            }

            // 3. Restore Files
            $extractPath = storage_path('app/temp_extract_' . time());
            File::makeDirectory($extractPath, 0755, true);
            $zip->extractTo($extractPath);
            $zip->close();

            $this->restoreFiles($extractPath);
            $this->restoreDatabase($extractPath . '/database.sql');

            // Cleanup
            File::deleteDirectory($extractPath);
            File::delete($uploadedPath);

            Notification::make()
                ->title('Restore Berhasil')
                ->success()
                ->body("Sistem telah dikembalikan. Backup sebelum restore tersimpan sebagai: $safetyBackupName")
                ->send();
        } else {
            Notification::make()->title('Gagal membuka file ZIP')->danger()->send();
        }
    }

    private function createBackup($zipPath)
    {
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

            // 1. Backup Database
            $sqlDump = $this->generateSqlDump();
            $zip->addFromString('database.sql', $sqlDump);

            // 2. Backup Folders
            $foldersToBackup = [
                resource_path('views'),
                public_path('css'),
                public_path('js'),
                public_path('images'), // UI Assets
                storage_path('app/public'), // Uploaded content
            ];

            foreach ($foldersToBackup as $folder) {
                if (File::isDirectory($folder)) {
                    $this->addFolderToZip($zip, $folder);
                }
            }

            $zip->close();
            return true;
        }
        return false;
    }

    private function addFolderToZip($zip, $folder)
    {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($folder),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                // Calculate relative path for zip
                // We want to preserve structure relative to root (e.g., resources/views/...)
                // But simplified: inside zip, we'll store relative to project root

                $relativePath = str_replace(base_path() . '\\', '', $filePath);
                $relativePath = str_replace(base_path() . '/', '', $filePath); // Handle slashes

                // Filter out large/unwanted files if needed
                if (!str_contains($filePath, 'node_modules') && !str_contains($filePath, '.git')) {
                    $zip->addFile($filePath, $relativePath);
                }
            }
        }
    }

    private function generateSqlDump()
    {
        $tables = DB::select('SHOW TABLES');
        $output = "";

        // Disable foreign key checks
        $output .= "SET FOREIGN_KEY_CHECKS=0;\n";

        foreach ($tables as $table) {
            $tableName = array_values((array) $table)[0];

            // Structure
            $createTable = DB::select("SHOW CREATE TABLE `$tableName`")[0]->{'Create Table'};
            $output .= "\n\n" . $createTable . ";\n\n";

            // Data
            $rows = DB::table($tableName)->get();
            foreach ($rows as $row) {
                $values = array_map(function ($value) {
                    if (is_null($value))
                        return "NULL";
                    if (is_numeric($value))
                        return $value;
                    return "'" . addslashes($value) . "'";
                }, (array) $row);

                $output .= "INSERT INTO `$tableName` VALUES (" . implode(", ", $values) . ");\n";
            }
        }

        $output .= "SET FOREIGN_KEY_CHECKS=1;\n";
        return $output;
    }

    private function restoreFiles($extractPath)
    {
        // Iterate recursively through extracted folders and copy them back to root
        // The zip structure mimics root (e.g. resources/views/...)

        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($extractPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($extractPath) + 1); // remove temp dir path

                $targetPath = base_path($relativePath);
                $targetDir = dirname($targetPath);

                if (!File::exists($targetDir)) {
                    File::makeDirectory($targetDir, 0755, true);
                }

                // Safety check: protect system files
                if (
                    str_starts_with($relativePath, 'resources') ||
                    str_starts_with($relativePath, 'public') ||
                    str_starts_with($relativePath, 'storage')
                ) {
                    copy($filePath, $targetPath);
                }
            }
        }
    }

    private function restoreDatabase($sqlPath)
    {
        DB::unprepared(file_get_contents($sqlPath));
    }
}
