<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DashboardButtonResource\Pages;
use App\Models\DashboardButton;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;

class DashboardButtonResource extends Resource
{
    protected static ?string $model = DashboardButton::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'Dashboard Buttons';

    protected static ?string $pluralLabel = 'Dashboard Buttons';

    protected static ?string $navigationGroup = 'Konten Website'; // Placing it with other content settings

    protected static ?int $navigationSort = 99;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('label')
                    ->required()
                    ->maxLength(255),
                TextInput::make('url')
                    ->label('URL / Route')
                    ->placeholder('https://example.com or /admin/resources')
                    ->required()
                    ->maxLength(255),
                TextInput::make('icon')
                    ->label('Icon (Heroicons)')
                    ->placeholder('heroicon-o-home')
                    ->helperText('Use full Heroicon name, e.g., heroicon-o-user')
                    ->required()
                    ->maxLength(255),
                Select::make('color')
                    ->options([
                        'primary' => 'Primary (Blue/Theme)',
                        'gray' => 'Gray',
                        'info' => 'Info (Blue)',
                        'success' => 'Success (Green)',
                        'warning' => 'Warning (Yellow)',
                        'danger' => 'Danger (Red)',
                        'sky' => 'Sky',
                    ])
                    ->default('primary')
                    ->required(),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->default(true),
                Toggle::make('open_in_new_tab')
                    ->label('Open in new tab')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')
                    ->sortable(),
                TextColumn::make('label')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('url')
                    ->limit(30),
                TextColumn::make('icon'),
                TextColumn::make('color')
                    ->badge(),
                ToggleColumn::make('is_active'),
                ToggleColumn::make('open_in_new_tab'),
            ])
            ->defaultSort('sort_order', 'asc')
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
            'index' => Pages\ListDashboardButtons::route('/'),
            'create' => Pages\CreateDashboardButton::route('/create'),
            'edit' => Pages\EditDashboardButton::route('/{record}/edit'),
        ];
    }
}
