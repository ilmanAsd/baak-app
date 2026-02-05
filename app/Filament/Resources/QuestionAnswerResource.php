<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionAnswerResource\Pages;
use App\Filament\Resources\QuestionAnswerResource\RelationManagers;
use App\Models\QuestionAnswer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionAnswerResource extends Resource
{
    protected static ?string $model = QuestionAnswer::class;

    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Kelola Q & A';
    protected static ?string $pluralLabel = 'Kelola Q & A';
    protected static ?string $modelLabel = 'Q & A';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pertanyaan Pengunjung')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Pengirim')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\Textarea::make('question')
                            ->label('Pertanyaan')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Jawaban Admin')
                    ->schema([
                        Forms\Components\Textarea::make('answer')
                            ->label('Jawaban')
                            ->rows(5)
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Tampilkan di Website')
                            ->default(false)
                            ->required(),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now()),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('question')
                    ->label('Pertanyaan')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('answer')
                    ->label('Status Jawaban')
                    ->state(fn($record) => $record->answer ? 'Sudah Dijawab' : 'Belum Dijawab')
                    ->badge()
                    ->color(fn($state) => $state === 'Sudah Dijawab' ? 'success' : 'warning'),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Publik')
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tgl Publikasi')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tgl Masuk')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                Tables\Actions\Action::make('export')
                    ->label('Export CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function () {
                        $records = QuestionAnswer::all();
                        $csvFileName = 'qa_export_' . now()->format('Y-m-d_H-i-s') . '.csv';
                        $headers = [
                            "Content-type" => "text/csv",
                            "Content-Disposition" => "attachment; filename=$csvFileName",
                            "Pragma" => "no-cache",
                            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                            "Expires" => "0"
                        ];

                        $columns = ['ID', 'Nama', 'Pertanyaan', 'Jawaban', 'Status Publik', 'Tgl Publikasi', 'Tgl Masuk'];

                        $callback = function () use ($records, $columns) {
                            $file = fopen('php://output', 'w');
                            fputcsv($file, $columns);

                            foreach ($records as $record) {
                                fputcsv($file, [
                                    $record->id,
                                    $record->name,
                                    $record->question,
                                    $record->answer,
                                    $record->is_published ? 'Ya' : 'Tidak',
                                    $record->published_at,
                                    $record->created_at,
                                ]);
                            }

                            fclose($file);
                        };

                        return response()->stream($callback, 200, $headers);
                    }),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi'),
                Tables\Filters\Filter::make('belum_dijawab')
                    ->label('Belum Dijawab')
                    ->query(fn(Builder $query): Builder => $query->whereNull('answer')),
            ])
            ->actions([
                Tables\Actions\Action::make('reply')
                    ->label('Balas')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->color('primary')
                    ->url(fn(QuestionAnswer $record): string => Pages\EditQuestionAnswer::getUrl(['record' => $record])),
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
            'index' => Pages\ListQuestionAnswers::route('/'),
            'create' => Pages\CreateQuestionAnswer::route('/create'),
            'edit' => Pages\EditQuestionAnswer::route('/{record}/edit'),
        ];
    }
}
