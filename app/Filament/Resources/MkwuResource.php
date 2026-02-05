<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MkwuResource\Pages;
use App\Filament\Resources\MkwuResource\RelationManagers;
use App\Models\Mkwu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MkwuResource extends Resource
{
    protected static ?string $model = \App\Models\LearningResource::class;
    protected static ?string $navigationGroup = 'Pembelajaran';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Pengaturan MKWU';
    protected static ?string $pluralLabel = 'Pengaturan MKWU';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function getModelLabel(): string
    {
        return 'Mata Kuliah MKWU';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pengaturan MKWU';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Mata Kuliah')
                    ->description('Masukkan detail mata kuliah wajib universitas (MKWU).')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Mata Kuliah')
                            ->placeholder('Contoh: Pancasila')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi MKWU')
                            ->placeholder('Jelaskan secara singkat mengenai capaian atau konten MK ini...')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Dokumen & Link Pendukung')
                    ->description('Upload silabus/RPS dan sertakan link materi jika ada.')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Silabus / RPS (PDF)')
                            ->directory('learning/mkwu')
                            ->acceptedFileTypes(['application/pdf']),
                        Forms\Components\TextInput::make('url')
                            ->label('Link Materi Pendukung')
                            ->placeholder('https://...')
                            ->url()
                            ->maxLength(255),
                    ]),

                Forms\Components\Section::make('Pengaturan Tampilan')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true),
                                Forms\Components\TextInput::make('order')
                                    ->label('Urutan')
                                    ->numeric()
                                    ->default(0),
                            ]),
                        Forms\Components\Hidden::make('category')
                            ->default('MKWU'),
                    ])
                    ->compact(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Mata Kuliah')
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
        return parent::getEloquentQuery()->where('category', 'MKWU');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMkwus::route('/'),
        ];
    }
}
