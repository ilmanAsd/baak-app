<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CounselingRequestResource\Pages;
use App\Filament\Resources\CounselingRequestResource\RelationManagers;
use App\Models\CounselingRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CounselingRequestResource extends Resource
{
    protected static ?string $model = CounselingRequest::class;

    protected static ?string $navigationGroup = 'Kemahasiswaan';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Counseling Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('nim')->label('NIM')->required(),
                Forms\Components\TextInput::make('prodi')->required(),
                Forms\Components\TextInput::make('phone')->tel()->required(),
                Forms\Components\Select::make('counselor_id')
                    ->relationship('counselor', 'name'),
                Forms\Components\Textarea::make('topic')->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'completed' => 'Completed',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('nim')->label('NIM'),
                Tables\Columns\TextColumn::make('prodi'),
                Tables\Columns\TextColumn::make('counselor.name'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'primary' => 'completed',
                        'danger' => 'rejected',
                    ]),
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
            'index' => Pages\ListCounselingRequests::route('/'),
            'create' => Pages\CreateCounselingRequest::route('/create'),
            'edit' => Pages\EditCounselingRequest::route('/{record}/edit'),
        ];
    }
}
