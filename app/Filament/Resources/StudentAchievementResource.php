<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentAchievementResource\Pages;
use App\Filament\Resources\StudentAchievementResource\RelationManagers;
use App\Models\StudentAchievement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentAchievementResource extends Resource
{
    protected static ?string $model = StudentAchievement::class;

    protected static ?string $navigationGroup = 'Kemahasiswaan';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Data Prestasi Mahasiswa';
    protected static ?string $pluralLabel = 'Data Prestasi Mahasiswa';
    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function getModelLabel(): string
    {
        return 'Prestasi Mahasiswa';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_mahasiswa')
                            ->label('Nama Mahasiswa')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('program_studi')
                            ->label('Program Studi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('kompetisi')
                            ->label('Kompetisi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tingkat')
                            ->label('Tingkat')
                            ->required()
                            ->placeholder('Contoh: Nasional, Internasional, Provinsi')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('prestasi')
                            ->label('Prestasi / Juara Ke')
                            ->required()
                            ->placeholder('Contoh: Juara 1, Harapan 2')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->required()
                            ->maxLength(4),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_mahasiswa')
                    ->label('Nama Mahasiswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('program_studi')
                    ->label('Program Studi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kompetisi')
                    ->label('Kompetisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tingkat')
                    ->label('Tingkat'),
                Tables\Columns\TextColumn::make('prestasi')
                    ->label('Prestasi'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tahun')
                    ->options(fn() => StudentAchievement::distinct()->pluck('tahun', 'tahun')->toArray()),
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
            'index' => Pages\ListStudentAchievements::route('/'),
            'create' => Pages\CreateStudentAchievement::route('/create'),
            'edit' => Pages\EditStudentAchievement::route('/{record}/edit'),
        ];
    }
}
