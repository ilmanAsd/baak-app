<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MbkmSettingResource\Pages;
use App\Filament\Resources\MbkmSettingResource\RelationManagers;
use App\Models\MbkmSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MbkmSettingResource extends Resource
{
    protected static ?string $model = MbkmSetting::class;

    protected static ?string $navigationGroup = 'Pembelajaran';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Pengaturan MBKM';
    protected static ?string $pluralLabel = 'Pengaturan MBKM';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function getModelLabel(): string
    {
        return 'Pengaturan MBKM';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Section (Atas)')
                    ->description('Atur judul dan deskripsi utama yang muncul di bagian paling atas halaman MBKM.')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Judul Hero')
                            ->placeholder('Contoh: KAMPUS MERDEKA')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('hero_description')
                            ->label('Deskripsi Hero')
                            ->placeholder('Masukkan deskripsi singkat tentang MBKM...')
                            ->rows(3)
                            ->required(),
                    ]),

                Forms\Components\Section::make('Section Apa Itu Kampus Berdampak?')
                    ->description('Atur gambar yang ditampilkan di bagian pengenalan Kampus Berdampak.')
                    ->schema([
                        Forms\Components\FileUpload::make('impact_image')
                            ->label('Gambar Section (Kampus Berdampak)')
                            ->directory('settings/mbkm')
                            ->image()
                            ->imageEditor()
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
                Tables\Columns\ImageColumn::make('impact_image')
                    ->label('Gambar Impact')
                    ->circular(),
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
            'index' => Pages\ManageMbkmSettings::route('/'),
        ];
    }
}
