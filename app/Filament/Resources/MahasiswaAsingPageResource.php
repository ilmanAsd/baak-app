<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaAsingPageResource\Pages;
use App\Models\MahasiswaAsingPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MahasiswaAsingPageResource extends Resource
{
    protected static ?string $model = MahasiswaAsingPage::class;

    protected static ?string $navigationGroup = 'Kemahasiswaan';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'View Halaman Mhs Asing';
    protected static ?string $pluralLabel = 'View Halaman Mhs Asing';
    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Umum')
                    ->description('Kelola data statistik dan dokumen mahasiswa asing.')
                    ->schema([
                        Forms\Components\TextInput::make('total_students')
                            ->label('Total Mahasiswa Asing')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        Forms\Components\TagsInput::make('study_programs')
                            ->label('Prodi dengan Mahasiswa Asing')
                            ->placeholder('Tambah Prodi')
                            ->separator(',')
                            ->suggestions([
                                'Kedokteran',
                                'Farmasi',
                                'Hukum',
                                'Ekonomi',
                            ]),
                        Forms\Components\FileUpload::make('sop_document')
                            ->label('Upload Dokumen SOP')
                            ->directory('mahasiswa-asing/sop')
                            ->acceptedFileTypes(['application/pdf'])
                            ->preserveFilenames()
                            ->downloadable(),
                    ]),
                Forms\Components\Section::make('Suasana dan Fasilitas')
                    ->description('Kelola daftar fasilitas dan suasana kampus.')
                    ->schema([
                        Forms\Components\Repeater::make('facilities')
                            ->relationship()
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Gambar')
                                    ->directory('mahasiswa-asing/facilities')
                                    ->image()
                                    ->imageEditor()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Fasilitas')
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->label('Deskripsi Fasilitas')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? null),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('total_students')
                    ->label('Total Mhs'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswaAsingPages::route('/'),
            'create' => Pages\CreateMahasiswaAsingPage::route('/create'),
            'edit' => Pages\EditMahasiswaAsingPage::route('/{record}/edit'),
        ];
    }
}
