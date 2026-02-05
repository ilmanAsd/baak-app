<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MbkmResource\Pages;
use App\Filament\Resources\MbkmResource\RelationManagers;
use App\Models\Mbkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MbkmResource extends Resource
{
    protected static ?string $model = \App\Models\LearningResource::class;
    protected static ?string $navigationGroup = 'Pembelajaran';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'MBKM';
    protected static ?string $pluralLabel = 'MBKM';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getModelLabel(): string
    {
        return 'MBKM';
    }

    public static function getPluralModelLabel(): string
    {
        return 'MBKM';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kategori MBKM')
                    ->description('Pilih tipe konten yang ingin Anda tambahkan ke halaman MBKM')
                    ->schema([
                        Forms\Components\ToggleButtons::make('type')
                            ->label('Tipe Konten')
                            ->options([
                                'Program' => 'Program MBKM',
                                'Partnership' => 'Partnership (Instansi)',
                                'Video' => 'Video Dokumentasi',
                            ])
                            ->icons([
                                'Program' => 'heroicon-o-academic-cap',
                                'Partnership' => 'heroicon-o-user-group',
                                'Video' => 'heroicon-o-video-camera',
                            ])
                            ->colors([
                                'Program' => 'primary',
                                'Partnership' => 'success',
                                'Video' => 'warning',
                            ])
                            ->required()
                            ->default('Program')
                            ->live()
                            ->inline(),
                    ]),

                // SECTION: PROGRAM MBKM
                Forms\Components\Section::make('Item Program')
                    ->description('Input deskripsi dan file panduan untuk program MBKM')
                    ->visible(fn($get) => $get('type') === 'Program')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Program MBKM')
                            ->required(fn($get) => $get('type') === 'Program')
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi Program')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('file_path')
                            ->label('File Panduan (PDF)')
                            ->directory('learning/mbkm')
                            ->acceptedFileTypes(['application/pdf']),
                        Forms\Components\TextInput::make('url')
                            ->label('Link Pendaftaran / Info Eksternal')
                            ->url()
                            ->maxLength(255),
                    ]),

                // SECTION: PARTNERSHIP
                Forms\Components\Section::make('Item Partnership')
                    ->description('Input nama instansi dan upload logo partner')
                    ->visible(fn($get) => $get('type') === 'Partnership')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Instansi')
                            ->required(fn($get) => $get('type') === 'Partnership')
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi Singkat / Profil Instansi')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Upload Logo Instansi')
                            ->directory('learning/mbkm')
                            ->image()
                            ->required(fn($get) => $get('type') === 'Partnership'),
                    ]),

                // SECTION: VIDEO
                Forms\Components\Section::make('Item Video')
                    ->description('Input judul dan link video Youtube')
                    ->visible(fn($get) => $get('type') === 'Video')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Video')
                            ->required(fn($get) => $get('type') === 'Video')
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->label('Keterangan Video')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('video_url')
                            ->label('Link Video Youtube')
                            ->required(fn($get) => $get('type') === 'Video')
                            ->placeholder('https://youtu.be/...')
                            ->url(),
                    ]),

                Forms\Components\Section::make('Pengaturan Tampilan')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true),
                                Forms\Components\TextInput::make('order')
                                    ->label('Urutan Tampilan')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\Hidden::make('category')
                                    ->default('MBKM'),
                            ]),
                    ])
                    ->compact(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Program' => 'primary',
                        'Partnership' => 'success',
                        'Video' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\ImageColumn::make('file_path')
                    ->label('Logo')
                    ->circular()
                    ->visible(fn($record) => $record?->type === 'Partnership'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul / Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('category', 'MBKM');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMbkms::route('/'),
        ];
    }
}
