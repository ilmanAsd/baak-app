<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyProgramDocumentSettingResource\Pages;
use App\Filament\Resources\StudyProgramDocumentSettingResource\RelationManagers;
use App\Models\StudyProgramDocumentSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudyProgramDocumentSettingResource extends Resource
{
    protected static ?string $model = StudyProgramDocumentSetting::class;

    protected static ?string $navigationGroup = 'Rekap Dokumen Prodi';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Pengaturan Rekap';
    protected static ?string $breadcrumb = 'Pengaturan Rekap';
    protected static ?string $modelLabel = 'Pengaturan Rekap';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('spreadsheet_url')
                    ->label('Google Spreadsheet URL (Export to CSV)')
                    ->helperText('Contoh: https://docs.google.com/spreadsheets/d/ID_SPREADSHEET/edit')
                    ->required()
                    ->url(),
                Forms\Components\TextInput::make('password')
                    ->label('Password Akses Halaman')
                    ->helperText('Biarkan kosong jika tidak ingin menggunakan password')
                    ->password()
                    ->revealable(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('spreadsheet_url')
                    ->label('Spreadsheet URL')
                    ->limit(50),
                Tables\Columns\TextColumn::make('password')
                    ->label('Password Set')
                    ->formatStateUsing(fn($state) => $state ? '********' : 'Not Set'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStudyProgramDocumentSettings::route('/'),
        ];
    }
}
