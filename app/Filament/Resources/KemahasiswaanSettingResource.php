<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KemahasiswaanSettingResource\Pages;
use App\Filament\Resources\KemahasiswaanSettingResource\RelationManagers;
use App\Models\KemahasiswaanSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KemahasiswaanSettingResource extends Resource
{
    protected static ?string $model = KemahasiswaanSetting::class;

    protected static ?string $navigationGroup = 'Kemahasiswaan';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationLabel = 'Pengaturan Halaman Kemahasiswaan';
    protected static ?string $pluralLabel = 'Pengaturan Halaman';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function getModelLabel(): string
    {
        return 'Pengaturan Halaman';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Top Section')
                    ->description('Atur banner, judul, dan deskripsi di bagian atas halaman.')
                    ->schema([
                        Forms\Components\FileUpload::make('banner_image')
                            ->label('Banner Image')
                            ->directory('settings/kemahasiswaan')
                            ->image()
                            ->imageEditor(),
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Halaman')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Halaman')
                            ->rows(3),
                    ]),
                Forms\Components\Section::make('Sambutan Wakil Rektor')
                    ->description('Atur foto dan isi sambutan Wakil Rektor.')
                    ->schema([
                        Forms\Components\FileUpload::make('rector_image')
                            ->label('Foto Wakil Rektor')
                            ->directory('settings/kemahasiswaan')
                            ->image()
                            ->imageEditor(),
                        Forms\Components\TextInput::make('rector_name')
                            ->label('Nama Wakil Rektor')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('rector_greeting_title')
                            ->label('Judul Sambutan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('rector_greeting_content')
                            ->label('Isi Sambutan')
                            ->required(),
                    ]),
                Forms\Components\Section::make('Tentang Kemahasiswaan')
                    ->description('Atur deskripsi untuk bagian Tentang Kemahasiswaan.')
                    ->schema([
                        Forms\Components\Textarea::make('about_description')
                            ->label('Deskripsi Tentang')
                            ->rows(4),
                    ]),
                Forms\Components\Section::make('Statistik Manual')
                    ->description('Atur angka statistik yang ditampilkan di halaman.')
                    ->schema([
                        Forms\Components\TextInput::make('stat_staff')
                            ->label('Jumlah Staff')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('stat_ormawa')
                            ->label('Jumlah Ormawa')
                            ->numeric()
                            ->default(0),
                        Forms\Components\TextInput::make('stat_ukm')
                            ->label('Jumlah UKM')
                            ->numeric()
                            ->default(0),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Halaman')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rector_name')
                    ->label('Nama Wakil Rektor'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageKemahasiswaanSettings::route('/'),
        ];
    }
}
