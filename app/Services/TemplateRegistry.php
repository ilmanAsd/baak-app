<?php

namespace App\Services;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class TemplateRegistry
{
    public static function getTemplates(): array
    {
        return [
            'template_standart' => [
                'label' => 'Template Standart',
                'description' => 'Layout profesional dengan header sinematik, kartu informasi, dan accordion, mirip dengan Portal Akademik.',
                'thumbnail' => 'images/templates/standard-portal-preview.jpg',
                'view' => 'pages.templates.standard-portal',
                'schema' => [
                    'banner_image' => FileUpload::make('banner_image')->label('Background Image')->image()->directory('page-banners')->columnSpanFull(),
                    'hero_title' => TextInput::make('hero_title')->label('Main Title')->required(),
                    'hero_description' => Textarea::make('hero_description')->label('Description / Subtitle')->rows(3),

                    'info_cards' => \Filament\Forms\Components\Repeater::make('info_cards')
                        ->label('Info Cards')
                        ->schema([
                            \Filament\Forms\Components\Grid::make(2)->schema([
                                \Filament\Forms\Components\Select::make('color')
                                    ->options([
                                        'blue' => 'Blue (Administrasi)',
                                        'indigo' => 'Indigo (Eksternal)',
                                        'teal' => 'Teal (Internal)',
                                        'orange' => 'Orange (Lainnya)',
                                    ])->default('blue')->required(),
                                TextInput::make('icon')->label('Icon Name')->placeholder('heroicon-o-folder')->default('heroicon-o-document-text')->required(),
                            ]),
                            TextInput::make('title')->label('Card Title')->required()->columnSpanFull(),
                            Textarea::make('description')->label('Card Description')->rows(2)->columnSpanFull(),
                            \Filament\Forms\Components\Grid::make(2)->schema([
                                TextInput::make('count_info')->label('Footer Text')->placeholder('1 Dokumen tersedia'),
                                TextInput::make('link_url')->label('Link URL')->required(),
                            ]),
                            TextInput::make('link_text')->label('Link Text')->default('Lihat Dokumen'),
                        ])
                        ->columnSpanFull()
                        ->grid(2),

                    'accordion_items' => \Filament\Forms\Components\Repeater::make('accordion_items')
                        ->label('Accordion Items')
                        ->schema([
                            TextInput::make('title')->label('Accordion Title')->required(),
                            RichEditor::make('content')->label('Accordion Content')->required()->default(''),
                        ])
                        ->columnSpanFull(),

                    'content' => RichEditor::make('content')->label('Page Content')->required()->default(''),
                ]
            ],
            'template_middle' => [
                'label' => 'Template Middle',
                'description' => 'Layout informatif dengan tab horizontal dan gaya visual seperti halaman Beasiswa.',
                'thumbnail' => 'images/templates/standard-portal-preview.jpg', // Placeholder
                'view' => 'pages.templates.template-middle',
                'schema' => [
                    // Top Section
                    \Filament\Forms\Components\Section::make('Top Section')
                        ->schema([
                            TextInput::make('top_title')->label('Judul Top Section')->required(),
                            Textarea::make('top_description')->label('Deskripsi Top Section')->rows(3),
                        ]),

                    // Content 1
                    \Filament\Forms\Components\Section::make('Konten Pembuka')
                        ->schema([
                            TextInput::make('content_1_title')->label('Judul Konten 1'),
                            RichEditor::make('content_1_description')->label('Deskripsi Konten 1'),
                        ]),

                    // Info Cards
                    'info_cards_middle' => \Filament\Forms\Components\Repeater::make('info_cards_middle')
                        ->label('Info Cards')
                        ->schema([
                            TextInput::make('title')->label('Judul Card')->required(),
                            Textarea::make('description')->label('Deskripsi Card')->rows(3),
                        ])
                        ->grid(2)
                        ->columnSpanFull(),

                    // Tabs
                    'tabs' => \Filament\Forms\Components\Repeater::make('tabs')
                        ->label('Tabs Horizontal')
                        ->schema([
                            TextInput::make('tab_label')->label('Label Tab (Header)')->required(),
                            TextInput::make('tab_title')->label('Judul Tab (Dalam Konten)'),
                            RichEditor::make('tab_content')->label('Deskripsi Tab'),
                        ])
                        ->columnSpanFull(),

                    // Accordion
                    'accordions' => \Filament\Forms\Components\Repeater::make('accordions')
                        ->label('Accordion / FAQ')
                        ->schema([
                            TextInput::make('title')->label('Judul Accordion')->required(),
                            RichEditor::make('content')->label('Isi Accordion')->required(),
                        ])
                        ->columnSpanFull(),
                ]
            ],
            'template_custom_table' => [
                'label' => 'Template Custom Table',
                'description' => 'Layout tabel dinamis dengan header, data, dan filter yang dapat disesuaikan, mirip dengan Arsip BAAK.',
                'thumbnail' => 'images/templates/standard-portal-preview.jpg', // Placeholder
                'view' => 'pages.templates.template-custom-table',
                'schema' => [
                    // Header Section
                    \Filament\Forms\Components\Section::make('Header Section')
                        ->schema([
                            TextInput::make('top_title')->label('Judul Portal')->required()->default('Arsip BAAK'),
                            Textarea::make('top_description')->label('Deskripsi Portal')->rows(3),
                        ]),

                    // Table Configuration
                    \Filament\Forms\Components\Section::make('Konfigurasi Tabel')
                        ->schema([
                            \Filament\Forms\Components\Repeater::make('columns')
                                ->label('Kolom Tabel')
                                ->schema([
                                    TextInput::make('label')->label('Nama Kolom')->required(),
                                    \Filament\Forms\Components\Toggle::make('is_filterable')->label('Aktifkan Filter'),
                                ])
                                ->minItems(1)
                                ->maxItems(5)
                                ->grid(2)
                                ->columnSpanFull(),
                        ]),

                    // Table Data
                    \Filament\Forms\Components\Section::make('Data Tabel')
                        ->schema([
                            \Filament\Forms\Components\Repeater::make('rows')
                                ->label('Baris Data')
                                ->schema([
                                    TextInput::make('col_1')->label('Kolom 1 Data'),
                                    TextInput::make('col_2')->label('Kolom 2 Data'),
                                    TextInput::make('col_3')->label('Kolom 3 Data'),
                                    TextInput::make('col_4')->label('Kolom 4 Data'),
                                    TextInput::make('col_5')->label('Kolom 5 Data'),
                                    FileUpload::make('file')->label('Lampiran File')->directory('custom-table-files'),
                                    TextInput::make('link')->label('Link External'),
                                ])
                                ->columnSpanFull()
                                ->collapsed(),
                        ]),
                ]
            ],
            'template_table_eksternal' => [
                'label' => 'Template Table Eksternal',
                'description' => 'Layout tabel yang terhubung langsung dengan Google Spreadsheet secara real-time.',
                'thumbnail' => 'images/templates/standard-portal-preview.jpg', // Placeholder
                'view' => 'pages.templates.template-table-eksternal',
                'schema' => [
                    // Top Section
                    \Filament\Forms\Components\Section::make('Header Section')
                        ->schema([
                            TextInput::make('top_title')->label('Judul Portal')->required()->default('Rekap Dokumen'),
                            Textarea::make('top_description')->label('Deskripsi Portal')->rows(3),
                        ]),

                    // Configuration
                    \Filament\Forms\Components\Section::make('Konfigurasi Spreadsheet')
                        ->schema([
                            TextInput::make('spreadsheet_url')
                                ->label('URL Google Spreadsheet')
                                ->helperText('Pastikan spreadsheet diatur ke "Siapa saja yang memiliki link dapat melihat".')
                                ->required()
                                ->placeholder('https://docs.google.com/spreadsheets/d/.../edit'),

                            TextInput::make('filter_column_index')
                                ->label('Indeks Kolom Filter')
                                ->numeric()
                                ->helperText('Nomor kolom yang ingin dijadikan filter dropdown (dimulai dari 1). Biarkan 0 untuk menonaktifkan.')
                                ->default(0),
                        ]),
                ]
            ]
        ];
    }

    public static function getTemplate(string $key): ?array
    {
        return self::getTemplates()[$key] ?? null;
    }
}
