<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurriculumResource\Pages;
use App\Filament\Resources\CurriculumResource\RelationManagers;
use App\Models\Curriculum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CurriculumResource extends Resource
{
    protected static ?string $model = \App\Models\LearningResource::class;
    protected static ?string $navigationGroup = 'Pembelajaran';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Kurikulum';
    protected static ?string $pluralLabel = 'Kurikulum';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function getModelLabel(): string
    {
        return 'Kurikulum';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kurikulum';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Kurikulum')
                            ->placeholder('Contoh: Kurikulum Prodi Hukum 2024')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('faculty_id')
                                    ->label('Fakultas')
                                    ->relationship('faculty', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->live(),
                                Forms\Components\Select::make('study_program_id')
                                    ->label('Program Studi')
                                    ->relationship('studyProgram', 'name', function (Builder $query, Forms\Get $get) {
                                        if ($get('faculty_id')) {
                                            $query->where('faculty_id', $get('faculty_id'));
                                        }
                                    })
                                    ->searchable()
                                    ->preload(),
                            ]),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi / Keterangan')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('file_path')
                            ->label('File Dokumen (PDF)')
                            ->directory('learning/curriculum')
                            ->acceptedFileTypes(['application/pdf']),
                        Forms\Components\TextInput::make('url')
                            ->label('Link External / Bitly')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Hidden::make('category')
                            ->default('Kurikulum'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('faculty.name')
                    ->label('Fakultas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('studyProgram.name')
                    ->label('Program Studi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Nama Kurikulum')
                    ->searchable()
                    ->sortable()
                    ->description(fn($record) => strip_tags($record->description)),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('faculty_id')
                    ->label('Filter Fakultas')
                    ->relationship('faculty', 'name'),
                Tables\Filters\SelectFilter::make('study_program_id')
                    ->label('Filter Program Studi')
                    ->relationship('studyProgram', 'name'),
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
        return parent::getEloquentQuery()->where('category', 'Kurikulum');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCurricula::route('/'),
        ];
    }
}
