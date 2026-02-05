<?php

namespace App\Filament\Resources\KemahasiswaanSettingResource\Pages;

use App\Filament\Resources\KemahasiswaanSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKemahasiswaanSettings extends ManageRecords
{
    protected static string $resource = KemahasiswaanSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
