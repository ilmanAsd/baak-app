<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LanguageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-language';
    protected static ?string $navigationLabel = 'Bahasa Halaman';
    protected static ?string $title = 'Pengaturan Bahasa (Otomatis)';
    protected static ?string $slug = 'language-settings';
    protected static string $view = 'filament.pages.language-settings';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 90;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill($this->loadSettings());
    }

    public function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data');
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Konfigurasi Terjemahan Otomatis')
                ->description('Aktifkan fitur ini untuk menampilkan tombol ganti bahasa (ID/EN) di halaman website. Terjemahan akan dilakukan secara otomatis oleh Google Translate.')
                ->schema([
                    Toggle::make('is_enabled')
                        ->label('Aktifkan Tombol Ganti Bahasa')
                        ->helperText('Jika aktif, pengunjung dapat mengganti bahasa halaman ke Bahasa Inggris secara otomatis.')
                        ->default(false),
                ]),
        ];
    }

    public function save()
    {
        $state = $this->form->getState();

        $settings = [
            'is_enabled' => (bool) ($state['is_enabled'] ?? false),
        ];

        // Save to storage/app/language_settings.json
        Storage::put('language_settings.json', json_encode($settings, JSON_PRETTY_PRINT));

        Notification::make()
            ->title('Pengaturan Bahasa Disimpan')
            ->success()
            ->send();
    }

    private function loadSettings()
    {
        if (Storage::exists('language_settings.json')) {
            return json_decode(Storage::get('language_settings.json'), true);
        }

        return ['is_enabled' => false];
    }
}
