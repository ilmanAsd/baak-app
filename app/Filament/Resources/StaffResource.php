<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Utama')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('position')->required(),
                        Forms\Components\Select::make('category')
                            ->options([
                                'kepala_biro' => 'Kepala Biro',
                                'akademik' => 'Akademik',
                                'pembelajaran' => 'Pembelajaran',
                                'kemahasiswaan' => 'Kemahasiswaan',
                            ])->required(),
                        Forms\Components\Toggle::make('is_head')->label('Apakah Kepala/Kabag?'),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('staff-images')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Profil')
                    ->schema([
                        Forms\Components\Textarea::make('bio')->label('Biodata Singkat')->rows(3),
                        Forms\Components\Textarea::make('duties')->label('Tugas Pokok')->rows(3),
                    ]),

                Forms\Components\Section::make('Media Sosial')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')->prefix('https://facebook.com/'),
                        Forms\Components\TextInput::make('instagram')->prefix('https://instagram.com/'),
                        Forms\Components\TextInput::make('twitter')->prefix('https://twitter.com/'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('position')->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->colors([
                        'primary' => 'kepala_biro',
                        'success' => 'akademik',
                        'warning' => 'pembelajaran',
                        'danger' => 'kemahasiswaan',
                    ]),
                Tables\Columns\IconColumn::make('is_head')->boolean()->label('Head'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'kepala_biro' => 'Kepala Biro',
                        'akademik' => 'Akademik',
                        'pembelajaran' => 'Pembelajaran',
                        'kemahasiswaan' => 'Kemahasiswaan',
                    ]),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
