<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeetingAgendaResource\Pages;
use App\Filament\Resources\MeetingAgendaResource\RelationManagers;
use App\Models\MeetingAgenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MeetingAgendaResource extends Resource
{
    protected static ?string $model = MeetingAgenda::class;

    protected static ?string $navigationGroup = 'Post Information';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Agenda Rapat';
    protected static ?string $pluralLabel = 'Agenda Rapat';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\DatePicker::make('date')
                            ->label('Tanggal')
                            ->required()
                            ->default(now()),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul Agenda')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('file_path')
                            ->label('Upload File')
                            ->directory('meetings/files')
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publish?')
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publish'),
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
            'index' => Pages\ListMeetingAgendas::route('/'),
            'create' => Pages\CreateMeetingAgenda::route('/create'),
            'edit' => Pages\EditMeetingAgenda::route('/{record}/edit'),
        ];
    }
}
