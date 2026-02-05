<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CounselingScheduleResource\Pages;
use App\Filament\Resources\CounselingScheduleResource\RelationManagers;
use App\Models\CounselingSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CounselingScheduleResource extends Resource
{
    protected static ?string $model = CounselingSchedule::class;

    protected static ?string $navigationGroup = 'Mahasiswa';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('counselor_id')
                    ->relationship('counselor', 'name')
                    ->required(),
                Forms\Components\Select::make('day')
                    ->options([
                        'Monday' => 'Monday',
                        'Tuesday' => 'Tuesday',
                        'Wednesday' => 'Wednesday',
                        'Thursday' => 'Thursday',
                        'Friday' => 'Friday',
                        'Saturday' => 'Saturday',
                    ])
                    ->required(),
                Forms\Components\TimePicker::make('time_start')
                    ->required(),
                Forms\Components\TimePicker::make('time_end')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('counselor.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('day'),
                Tables\Columns\TextColumn::make('time_start'),
                Tables\Columns\TextColumn::make('time_end'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListCounselingSchedules::route('/'),
            'create' => Pages\CreateCounselingSchedule::route('/create'),
            'edit' => Pages\EditCounselingSchedule::route('/{record}/edit'),
        ];
    }
}
