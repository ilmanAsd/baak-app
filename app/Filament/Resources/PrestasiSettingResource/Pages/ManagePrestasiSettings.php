<?php

namespace App\Filament\Resources\PrestasiSettingResource\Pages;

use App\Filament\Resources\PrestasiSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePrestasiSettings extends ManageRecords
{
    protected static string $resource = PrestasiSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
