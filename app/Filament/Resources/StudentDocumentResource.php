<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentDocumentResource\Pages;
use App\Models\LearningResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class StudentDocumentResource extends Resource
{
    protected static ?string $model = LearningResource::class;

    protected static ?string $navigationGroup = 'Kemahasiswaan';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationLabel = 'Dokumen Kemahasiswaan';
    protected static ?string $pluralLabel = 'Dokumen Kemahasiswaan';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dokumen')
                    ->description('Masukkan detail dokumen kemahasiswaan.')
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
                                    ->placeholder('Contoh: Pedoman PKM 2024')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(2),
                            ]),
                        Forms\Components\Select::make('student_category_id')
                            ->label('Kategori Dokumen')
                            ->relationship('studentCategory', 'name', fn(Builder $query) => $query->where('is_active', true))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->native(false),
                    ]),

                Forms\Components\Section::make('File & Link')
                    ->description('Upload file dokumen atau sertakan link eksternal.')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('File Dokumen (PDF)')
                            ->directory('student/documents')
                            ->acceptedFileTypes(['application/pdf'])
                            ->required(fn($get) => !$get('url')),
                        Forms\Components\TextInput::make('url')
                            ->label('Link Eksternal (Jika tidak upload file)')
                            ->placeholder('https://...')
                            ->url()
                            ->maxLength(255)
                            ->required(fn($get) => !$get('file_path')),
                    ]),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true),
                                Forms\Components\TextInput::make('order')
                                    ->label('Urutan Tampilan')
                                    ->numeric()
                                    ->default(0),
                            ]),
                        Forms\Components\Hidden::make('category')
                            ->default('Dokumen Kemahasiswaan'),
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
                Tables\Columns\BadgeColumn::make('studentCategory.name')
                    ->label('Kategori')
                    ->colors([
                        'primary',
                    ]),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('student_category_id')
                    ->label('Kategori')
                    ->relationship('studentCategory', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('category', 'Dokumen Kemahasiswaan');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStudentDocuments::route('/'),
        ];
    }
}
