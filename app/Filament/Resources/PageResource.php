<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Page Settings')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('template_key')
                            ->label('Template')
                            ->options(collect(\App\Services\TemplateRegistry::getTemplates())->mapWithKeys(fn($item, $key) => [$key => $item['label']]))
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                // Reset fields to avoid stale state or undefined errors
                                $set('content', '');
                                $set('hero_title', null);
                                $set('hero_description', null);
                                $set('banner_image', null);
                                $set('info_cards', []);
                                $set('accordion_items', []);
                                $set('top_title', null);
                                $set('top_description', null);
                                $set('content_1_title', null);
                                $set('content_1_description', null);
                                $set('info_cards_middle', []);
                                $set('tabs', []);
                                $set('accordions', []);
                                $set('columns', []);
                                $set('rows', []);
                                $set('spreadsheet_url', null);
                                $set('filter_column_index', 0);
                            }),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Page Content')
                    ->schema(function (Forms\Get $get) {
                        $templateKey = $get('template_key');
                        $template = \App\Services\TemplateRegistry::getTemplate($templateKey ?? '');

                        if (!$template) {
                            return [
                                Forms\Components\Placeholder::make('no_template')
                                    ->label('')
                                    ->content('Silakan pilih template di atas untuk menampilkan form konten.'),
                            ];
                        }

                        return $template['schema'] ?? [];
                    })
                    ->key(fn(Forms\Get $get) => $get('template_key') ?? 'no_template')
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\TextColumn::make('template_key')
                    ->formatStateUsing(fn(string $state) => \App\Services\TemplateRegistry::getTemplate($state)['label'] ?? $state)
                    ->badge(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
