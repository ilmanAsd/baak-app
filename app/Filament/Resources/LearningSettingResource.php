<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearningSettingResource\Pages;
use App\Filament\Resources\LearningSettingResource\RelationManagers;
use App\Models\LearningSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LearningSettingResource extends Resource
{
    protected static ?string $model = \App\Models\LearningSetting::class;
    protected static ?string $navigationGroup = 'Pembelajaran';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Pengaturan Halaman';
    protected static ?string $pluralLabel = 'Pengaturan Halaman';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero / Top Section')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Portal')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->rows(3),
                        Forms\Components\FileUpload::make('banner_image')
                            ->label('Gambar Banner')
                            ->image()
                            ->directory('learning/settings'),
                    ]),
                Forms\Components\Section::make('Section Profil & Layanan')
                    ->schema([
                        Forms\Components\TextInput::make('video_url')
                            ->label('URL Video (Youtube Share Link / File Path)')
                            ->placeholder('Contoh: https://youtu.be/xxx atau link internal'),
                        Forms\Components\TextInput::make('spada_url')
                            ->label('Link Akses SPADA')
                            ->url()
                            ->default('https://spada1.unik-kediri.ac.id'),
                        Forms\Components\TextInput::make('curriculum_password')
                            ->label('Password Halaman Kurikulum')
                            ->password()
                            ->revealable()
                            ->helperText('Kosongkan jika tidak ingin memproteksi halaman kurikulum.'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul'),
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('Banner'),
                Tables\Columns\TextColumn::make('video_url')
                    ->label('Video URL')
                    ->limit(30),
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
            'index' => Pages\ManageLearningSettings::route('/'),
        ];
    }
}
