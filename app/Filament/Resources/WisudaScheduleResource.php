<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WisudaScheduleResource\Pages;
use App\Models\WisudaSchedule;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WisudaScheduleResource extends Resource
{
    protected static ?string $model = WisudaSchedule::class;

    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Info Wisuda';
    protected static ?string $modelLabel = 'Info Wisuda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('year')
                    ->label('Periode Wisuda (Tahun)')
                    ->placeholder('Contoh: 2024/2025')
                    ->required()
                    ->maxLength(255),

                Section::make('Semester Genap')
                    ->schema([
                        TextInput::make('schedule_genap_link')
                            ->label('Link Jadwal (Genap)')
                            ->placeholder('Link Google Drive / PDF')
                            ->url(),
                        TextInput::make('photo_genap_link')
                            ->label('Link Foto (Genap)')
                            ->placeholder('Link Google Drive')
                            ->url(),
                    ])->columns(2),

                Section::make('Semester Ganjil')
                    ->schema([
                        TextInput::make('schedule_ganjil_link')
                            ->label('Link Jadwal (Ganjil)')
                            ->placeholder('Link Google Drive / PDF')
                            ->url(),
                        TextInput::make('photo_ganjil_link')
                            ->label('Link Foto (Ganjil)')
                            ->placeholder('Link Google Drive')
                            ->url(),
                    ])->columns(2),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('year')->label('Periode')->sortable()->searchable(),
                TextColumn::make('schedule_genap_link')->label('Jadwal Genap')->limit(20),
                TextColumn::make('schedule_ganjil_link')->label('Jadwal Ganjil')->limit(20),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Aktif'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWisudaSchedules::route('/'),
            'create' => Pages\CreateWisudaSchedule::route('/create'),
            'edit' => Pages\EditWisudaSchedule::route('/{record}/edit'),
        ];
    }
}
