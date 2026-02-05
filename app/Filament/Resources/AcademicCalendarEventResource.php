<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicCalendarEventResource\Pages;
use App\Filament\Resources\AcademicCalendarEventResource\RelationManagers;
use App\Models\AcademicCalendarEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicCalendarEventResource extends Resource
{
    protected static ?string $model = AcademicCalendarEvent::class;

    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Kalender Akademik';
    protected static ?string $modelLabel = 'Event Kalender';
    protected static ?string $pluralModelLabel = 'Kalender Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Kegiatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('academic_year')
                            ->label('Tahun Akademik')
                            ->placeholder('Contoh: 2024/2025')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Mahasiswa' => 'Mahasiswa',
                                'Fakultas' => 'Fakultas',
                            ])
                            ->required(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->label('Tanggal Mulai')
                                    ->required(),
                                Forms\Components\DatePicker::make('end_date')
                                    ->label('Tanggal Selesai')
                                    ->nullable(),
                            ]),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Keterangan')
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('academic_year')
                    ->label('Th. Akademik')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Mahasiswa' => 'success',
                        'Fakultas' => 'warning',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('academic_year')
                    ->label('Filter Tahun Akademik')
                    ->options(fn() => AcademicCalendarEvent::distinct()->pluck('academic_year', 'academic_year')->filter()->toArray()),
                Tables\Filters\SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'Mahasiswa' => 'Mahasiswa',
                        'Fakultas' => 'Fakultas',
                    ]),
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
            'index' => Pages\ListAcademicCalendarEvents::route('/'),
            'create' => Pages\CreateAcademicCalendarEvent::route('/create'),
            'edit' => Pages\EditAcademicCalendarEvent::route('/{record}/edit'),
        ];
    }
}
