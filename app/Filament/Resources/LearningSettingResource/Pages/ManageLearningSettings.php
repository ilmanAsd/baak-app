<?php

namespace App\Filament\Resources\LearningSettingResource\Pages;

use App\Filament\Resources\LearningSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLearningSettings extends ManageRecords
{
    protected static string $resource = LearningSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
