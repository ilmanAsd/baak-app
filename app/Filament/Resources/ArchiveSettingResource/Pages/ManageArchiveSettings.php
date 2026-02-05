<?php

namespace App\Filament\Resources\ArchiveSettingResource\Pages;

use App\Filament\Resources\ArchiveSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageArchiveSettings extends ManageRecords
{
    protected static string $resource = ArchiveSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
