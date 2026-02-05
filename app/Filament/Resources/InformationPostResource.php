<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformationPostResource\Pages;
use App\Models\InformationPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class InformationPostResource extends Resource
{
    protected static ?string $model = InformationPost::class;

    protected static ?string $navigationGroup = 'Post Information';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Berita & Informasi';
    protected static ?string $pluralLabel = 'Berita & Informasi';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Berita')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('information_category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('slug')
                                    ->required(),
                            ])
                            ->required(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->image()
                            ->directory('information/posts')
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('attachment')
                            ->label('File Lampiran (Opsional)')
                            ->directory('information/attachments')
                            ->storeFileNamesIn('attachment_name')
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->label('Konten Berita')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publish?')
                            ->default(true),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publish')
                            ->default(now()),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('information_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInformationPosts::route('/'),
            'create' => Pages\CreateInformationPost::route('/create'),
            'edit' => Pages\EditInformationPost::route('/{record}/edit'),
        ];
    }
}
