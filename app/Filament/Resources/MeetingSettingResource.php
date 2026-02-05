<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeetingSettingResource\Pages;
use App\Filament\Resources\MeetingSettingResource\RelationManagers;
use App\Models\MeetingSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeetingSettingResource extends Resource
{
    protected static ?string $model = MeetingSetting::class;

    protected static ?string $navigationGroup = 'Post Information';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Pengaturan Halaman Rapat';
    protected static ?string $pluralLabel = 'Pengaturan Halaman Rapat';
    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->label('Password Halaman Rapat')
                            ->password()
                            ->revealable()
                            ->helperText('Kosongkan jika tidak ingin memproteksi halaman agenda rapat.'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('password')
                    ->label('Password Set')
                    ->formatStateUsing(fn($state) => $state ? '********' : 'Not Set'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMeetingSettings::route('/'),
        ];
    }
}
