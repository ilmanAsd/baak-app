<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicDocumentResource\Pages;
use App\Filament\Resources\AcademicDocumentResource\RelationManagers;
use App\Models\AcademicDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicDocumentResource extends Resource
{
    protected static ?string $model = AcademicDocument::class;

    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Dokumen Akademik';
    protected static ?string $modelLabel = 'Dokumen Akademik';
    protected static ?string $pluralModelLabel = 'Dokumen Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('document_category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('year')
                    ->numeric()
                    ->placeholder('Contoh: 2024')
                    ->nullable(),
                Forms\Components\FileUpload::make('file_path')
                    ->directory('academic-documents')
                    ->nullable(),
                Forms\Components\TextInput::make('url')
                    ->url()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('year', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('document_category_id')
                    ->relationship('category', 'name')
                    ->label('Kategori'),
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
            'index' => Pages\ListAcademicDocuments::route('/'),
            'create' => Pages\CreateAcademicDocument::route('/create'),
            'edit' => Pages\EditAcademicDocument::route('/{record}/edit'),
        ];
    }
}
