<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicAtmosphereResource\Pages;
use App\Filament\Resources\AcademicAtmosphereResource\RelationManagers;
use App\Models\AcademicAtmosphere;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicAtmosphereResource extends Resource
{
    protected static ?string $model = AcademicAtmosphere::class;

    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Rekap Suasana Akademik';
    protected static ?string $modelLabel = 'Rekap Suasana Akademik';
    protected static ?string $pluralModelLabel = 'Rekap Suasana Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konfigurasi Spreadsheet')
                    ->description('Pastikan Google Spreadsheet telah dipublikasikan ke web (File > Share > Publish to web) agar data dapat disinkronkan.')
                    ->schema([
                        Forms\Components\TextInput::make('spreadsheet_url')
                            ->label('Link Google Spreadsheet')
                            ->placeholder('https://docs.google.com/spreadsheets/d/...')
                            ->helperText('Masukkan URL lengkap spreadsheet atau link "Publish to web".')
                            ->url()
                            ->required()
                            ->maxLength(191),
                        Forms\Components\Textarea::make('description')
                            ->label('Nama Sumber / Keterangan')
                            ->placeholder('Contoh: Data Suasana Akademik Master')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Status Aktif')
                                    ->helperText('Tampilkan di website')
                                    ->default(true)
                                    ->required(),
                                Forms\Components\TextInput::make('order')
                                    ->label('Urutan Tampil')
                                    ->helperText('Angka lebih kecil tampil lebih dulu')
                                    ->required()
                                    ->numeric()
                                    ->default(0),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('No.')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Nama Sumber')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('spreadsheet_url')
                    ->label('Link Spreadsheet')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAcademicAtmospheres::route('/'),
            'create' => Pages\CreateAcademicAtmosphere::route('/create'),
            'edit' => Pages\EditAcademicAtmosphere::route('/{record}/edit'),
        ];
    }
}
