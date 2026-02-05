<?php

namespace App\Filament\Resources\MeetingSettingResource\Pages;

use App\Filament\Resources\MeetingSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMeetingSettings extends ManageRecords
{
    protected static string $resource = MeetingSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
