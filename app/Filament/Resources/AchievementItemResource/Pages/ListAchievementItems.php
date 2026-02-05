<?php

namespace App\Filament\Resources\AchievementItemResource\Pages;

use App\Filament\Resources\AchievementItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAchievementItems extends ListRecords
{
    protected static string $resource = AchievementItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
