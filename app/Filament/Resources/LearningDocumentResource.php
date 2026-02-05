<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearningDocumentResource\Pages;
use App\Filament\Resources\LearningDocumentResource\RelationManagers;
use App\Models\LearningDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LearningDocumentResource extends Resource
{
    protected static ?string $model = \App\Models\LearningResource::class;
    protected static ?string $navigationGroup = 'Pembelajaran';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Dokumen Pembelajaran';
    protected static ?string $pluralLabel = 'Dokumen Pembelajaran';
    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dokumen')
                    ->description('Masukkan detail dokumen pembelajaran.')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('year')
                                    ->label('Tahun')
                                    ->placeholder('Contoh: 2024')
                                    ->required()
                                    ->maxLength(4),
                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Dokumen')
                                    ->placeholder('Contoh: Kalender Akademik 2024/2025')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(2),
                            ]),
                        Forms\Components\RichEditor::make('description')
                            ->label('Keterangan Dokumen')
                            ->placeholder('Jelaskan isi dokumen secara singkat...')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('File & Link')
                    ->description('Upload file dokumen atau sertakan link eksternal.')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('File Dokumen (PDF)')
                            ->directory('learning/documents')
                            ->acceptedFileTypes(['application/pdf']),
                        Forms\Components\TextInput::make('url')
                            ->label('Link Eksternal (Jika tidak upload file)')
                            ->placeholder('https://...')
                            ->url()
                            ->maxLength(255),
                    ]),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('learning_category_id')
                                    ->label('Kategori Dokumen')
                                    ->relationship('learningCategory', 'name', fn(Builder $query) => $query->where('is_active', true))
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false),
                                Forms\Components\TextInput::make('order')
                                    ->label('Urutan Tampilan')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true),
                            ]),
                        Forms\Components\Hidden::make('category')
                            ->default('Dokumen Pembelajaran'),
                    ])->compact(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Dokumen')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('learningCategory.name')
                    ->label('Kategori')
                    ->colors(['primary']),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('learning_category_id')
                    ->label('Kategori')
                    ->relationship('learningCategory', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('category', 'Dokumen Pembelajaran');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLearningDocuments::route('/'),
        ];
    }
}
