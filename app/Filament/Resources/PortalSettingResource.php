<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortalSettingResource\Pages;
use App\Filament\Resources\PortalSettingResource\RelationManagers;
use App\Models\PortalSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortalSettingResource extends Resource
{
    protected static ?string $model = PortalSetting::class;

    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Pengaturan Halaman';
    protected static ?string $modelLabel = 'Pengaturan Halaman';
    protected static ?string $pluralModelLabel = 'Pengaturan Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Header / Banner')
                    ->schema([
                        Forms\Components\FileUpload::make('banner_image')
                            ->image()
                            ->directory('portal-banner')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Tombol Aksi')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('button_1_text')->label('Label Tombol 1'),
                                Forms\Components\TextInput::make('button_1_url')->label('URL Tombol 1'),
                                Forms\Components\TextInput::make('button_2_text')->label('Label Tombol 2'),
                                Forms\Components\TextInput::make('button_2_url')->label('URL Tombol 2'),
                            ]),
                        Forms\Components\TextInput::make('calendar_pdf')
                            ->label('Link PDF Kalender Akademik')
                            ->placeholder('Masukkan URL file PDF kalender')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_image'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListPortalSettings::route('/'),
            'create' => Pages\CreatePortalSetting::route('/create'),
            'edit' => Pages\EditPortalSetting::route('/{record}/edit'),
        ];
    }
}
