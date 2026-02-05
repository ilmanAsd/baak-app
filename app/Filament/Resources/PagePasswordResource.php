<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagePasswordResource\Pages;
use App\Models\PagePassword;
use App\Models\Page;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PagePasswordResource extends Resource
{
    protected static ?string $model = PagePassword::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static ?string $navigationLabel = 'Pengaturan Password Page';
    protected static ?string $modelLabel = 'Password Halaman';
    protected static ?string $pluralModelLabel = 'Password Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Keamanan Halaman')
                    ->description('Pilih halaman atau menu yang ingin diberikan proteksi password.')
                    ->schema([
                        Forms\Components\Select::make('target_type')
                            ->label('Jenis Target')
                            ->options([
                                Page::class => 'Halaman (Dynamic Page)',
                                Menu::class => 'Menu (Navigasi)',
                            ])
                            ->required()
                            ->live(),

                        Forms\Components\Select::make('target_id')
                            ->label('Pilih Halaman / Menu')
                            ->options(function (Forms\Get $get) {
                                $type = $get('target_type');
                                if ($type === Page::class) {
                                    return Page::all()->pluck('title', 'id');
                                }
                                if ($type === Menu::class) {
                                    return Menu::all()->pluck('name', 'id');
                                }
                                return [];
                            })
                            ->searchable()
                            ->required()
                            ->hidden(fn(Forms\Get $get) => !$get('target_type')),

                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Proteksi')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('target_type')
                    ->label('Tipe')
                    ->formatStateUsing(fn($state) => $state === Page::class ? 'Page' : 'Menu')
                    ->badge()
                    ->color(fn($state) => $state === Page::class ? 'info' : 'success'),

                Tables\Columns\TextColumn::make('target.title')
                    ->label('Nama Target')
                    ->state(function (Model $record) {
                        return $record->target_type === Page::class
                            ? $record->target?->title
                            : $record->target?->name;
                    })
                    ->searchable(),

                Tables\Columns\TextColumn::make('password')
                    ->label('Password')
                    ->copyable()
                    ->badge(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPagePasswords::route('/'),
            'create' => Pages\CreatePagePassword::route('/create'),
            'edit' => Pages\EditPagePassword::route('/{record}/edit'),
        ];
    }
}
