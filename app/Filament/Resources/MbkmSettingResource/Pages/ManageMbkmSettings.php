<?php

namespace App\Filament\Resources\MbkmSettingResource\Pages;

use App\Filament\Resources\MbkmSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMbkmSettings extends ManageRecords
{
    protected static string $resource = MbkmSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
