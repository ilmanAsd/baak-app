<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArchiveSettingResource\Pages;
use App\Filament\Resources\ArchiveSettingResource\RelationManagers;
use App\Models\ArchiveSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArchiveSettingResource extends Resource
{
    protected static ?string $model = ArchiveSetting::class;

    protected static ?string $navigationGroup = 'Arsip Dokumen';
    protected static ?string $navigationLabel = 'Pengaturan Akses';
    protected static ?string $pluralLabel = 'Pengaturan Akses';
    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->label('Password Akses Arsip')
                            ->password()
                            ->revealable()
                            ->helperText('Kosongkan jika tidak ingin memproteksi halaman Arsip BAAK.'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('password')
                    ->label('Password Set')
                    ->formatStateUsing(fn($state) => $state ? '********' : 'Not Set'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageArchiveSettings::route('/'),
        ];
    }
}
