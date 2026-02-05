<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileContentResource\Pages;
use App\Filament\Resources\ProfileContentResource\RelationManagers;
use App\Models\ProfileContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileContentResource extends Resource
{
    protected static ?string $model = ProfileContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Profile Contents';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Profil')
                    ->schema([
                        Forms\Components\RichEditor::make('about_us')
                            ->label('Tentang Kami')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('structure_image')
                            ->label('Gambar Struktur Organisasi')
                            ->image()
                            ->disk('public')
                            ->directory('profile-images')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Visi & Misi')
                    ->schema([
                        Forms\Components\RichEditor::make('vision')
                            ->label('Visi')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('mission')
                            ->label('Misi')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('about_us')
                    ->label('Tentang Kami')
                    ->limit(50)
                    ->html(),
                Tables\Columns\ImageColumn::make('structure_image')
                    ->label('Struktur Org'),
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
            'index' => Pages\ListProfileContents::route('/'),
            'create' => Pages\CreateProfileContent::route('/create'),
            'edit' => Pages\EditProfileContent::route('/{record}/edit'),
        ];
    }
}
