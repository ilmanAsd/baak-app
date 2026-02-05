<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\RelationManagers;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationLabel = 'Top Sections';
    protected static ?int $navigationSort = 9;
    protected static ?string $modelLabel = 'Top Section';
    protected static ?string $pluralModelLabel = 'Top Section';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Section')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Section')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Section')
                            ->rows(3)
                            ->required(),
                    ]),
                Forms\Components\Section::make('Visual')
                    ->schema([
                        Forms\Components\FileUpload::make('background_image')
                            ->label('Gambar Latar Belakang Hero')
                            ->helperText('Gambar utama di belakang teks')
                            ->directory('hero')
                            ->image()
                            ->required(),
                        Forms\Components\FileUpload::make('image_card_background')
                            ->label('Gambar Kartu (Latar)')
                            ->helperText('Gambar pada kartu yang berada di bagian belakang (Kanan Atas)')
                            ->directory('hero/cards')
                            ->image()
                            ->required(),
                        Forms\Components\FileUpload::make('image_card_foreground')
                            ->label('Gambar Kartu (Depan)')
                            ->helperText('Gambar pada kartu yang berada di bagian depan (Kiri Bawah)')
                            ->directory('hero/cards')
                            ->image()
                            ->required(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('background_image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}
