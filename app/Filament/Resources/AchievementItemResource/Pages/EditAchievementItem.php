<?php

namespace App\Filament\Resources\AchievementItemResource\Pages;

use App\Filament\Resources\AchievementItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAchievementItem extends EditRecord
{
    protected static string $resource = AchievementItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
