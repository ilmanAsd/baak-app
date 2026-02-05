<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalDocumentResource\Pages;
use App\Filament\Resources\ExternalDocumentResource\RelationManagers;
use App\Models\ExternalDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExternalDocumentResource extends Resource
{
    protected static ?string $model = ExternalDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationLabel = 'Dokumen Eksternal';

    protected static ?string $modelLabel = 'Dokumen Eksternal';

    protected static ?string $pluralModelLabel = 'Dokumen Eksternal';

    protected static ?string $navigationGroup = 'Manajemen Dokumen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('document_number')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->options([
                                'Berlaku' => 'Berlaku',
                                'Tidak Berlaku' => 'Tidak Berlaku',
                            ])
                            ->required()
                            ->default('Berlaku'),
                        Forms\Components\Select::make('category')
                            ->options([
                                'Akademik' => 'Akademik',
                                'Pembelajaran' => 'Pembelajaran',
                                'Kemahasiswaan' => 'Kemahasiswaan',
                            ])
                            ->required(),
                        Forms\Components\FileUpload::make('file_path')
                            ->directory('external-documents')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240),
                        Forms\Components\TextInput::make('url')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('document_number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'Berlaku',
                        'danger' => 'Tidak Berlaku',
                    ]),
                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Akademik' => 'Akademik',
                        'Pembelajaran' => 'Pembelajaran',
                        'Kemahasiswaan' => 'Kemahasiswaan',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Berlaku' => 'Berlaku',
                        'Tidak Berlaku' => 'Tidak Berlaku',
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
            'index' => Pages\ListExternalDocuments::route('/'),
            'create' => Pages\CreateExternalDocument::route('/create'),
            'edit' => Pages\EditExternalDocument::route('/{record}/edit'),
        ];
    }
}
