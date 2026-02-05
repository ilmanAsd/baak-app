<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AchievementItemResource\Pages;
use App\Filament\Resources\AchievementItemResource\RelationManagers;
use App\Models\AchievementItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AchievementItemResource extends Resource
{
    protected static ?string $model = AchievementItem::class;

    protected static ?string $navigationGroup = 'Kemahasiswaan';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Item Prestasi & Penghargaan';
    protected static ?string $pluralLabel = 'Item Prestasi & Penghargaan';
    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    public static function getModelLabel(): string
    {
        return 'Item Prestasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Jenis Item')
                            ->options([
                                'layanan' => 'Layanan Kemahasiswaan',
                                'penghargaan' => 'Program Penghargaan',
                                'pencapaian' => 'Milestone Pencapaian (Tabs)',
                            ])
                            ->required()
                            ->reactive(),
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Sub-judul / Kategori')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3),
                        Forms\Components\TextInput::make('link')
                            ->label('Link Action / Selengkapnya')
                            ->placeholder('https://...')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),

                Forms\Components\Section::make('Visual & Pengelompokan')
                    ->schema([
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon HeroIcon (untuk Layanan)')
                            ->placeholder('Contoh: heroicon-o-academic-cap')
                            ->visible(fn($get) => $get('type') === 'layanan'),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar / Foto (untuk Penghargaan / Pencapaian)')
                            ->directory('prestasi/items')
                            ->image()
                            ->visible(fn($get) => $get('type') !== 'layanan'),
                        Forms\Components\TextInput::make('tab')
                            ->label('Nama Tab (untuk Milestone)')
                            ->placeholder('Contoh: 2024, Prestasi Nasional, dsb.')
                            ->visible(fn($get) => $get('type') === 'pencapaian'),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Penghargaan')
                    ->visible(fn($get) => $get('type') === 'penghargaan')
                    ->schema([
                        Forms\Components\Repeater::make('benefits')
                            ->label('Manfaat yang Diperoleh')
                            ->simple(Forms\Components\TextInput::make('benefit')->label('Manfaat'))
                            ->addActionLabel('Tambah Manfaat'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'layanan' => 'gray',
                        'penghargaan' => 'warning',
                        'pencapaian' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tab')
                    ->label('Tab')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'layanan' => 'Layanan',
                        'penghargaan' => 'Penghargaan',
                        'pencapaian' => 'Pencapaian',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAchievementItems::route('/'),
            'create' => Pages\CreateAchievementItem::route('/create'),
            'edit' => Pages\EditAchievementItem::route('/{record}/edit'),
        ];
    }
}
