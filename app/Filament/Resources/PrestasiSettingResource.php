<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiSettingResource\Pages;
use App\Filament\Resources\PrestasiSettingResource\RelationManagers;
use App\Models\PrestasiSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestasiSettingResource extends Resource
{
    protected static ?string $model = PrestasiSetting::class;

    protected static ?string $navigationGroup = 'Kemahasiswaan';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Halaman Prestasi';
    protected static ?string $pluralLabel = 'Halaman Prestasi';
    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    public static function getModelLabel(): string
    {
        return 'Halaman Prestasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Section')
                    ->description('Atur judul, deskripsi, dan gambar utama di bagian atas halaman.')
                    ->schema([
                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Gambar Hero')
                            ->directory('settings/prestasi')
                            ->image()
                            ->imageEditor(),
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Judul Hero')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('hero_description')
                            ->label('Deskripsi Hero')
                            ->rows(3)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')
                    ->label('Judul Hero')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePrestasiSettings::route('/'),
        ];
    }
}
