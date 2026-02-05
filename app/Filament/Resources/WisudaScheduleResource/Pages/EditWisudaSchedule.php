<?php

namespace App\Filament\Resources\WisudaScheduleResource\Pages;

use App\Filament\Resources\WisudaScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWisudaSchedule extends EditRecord
{
    protected static string $resource = WisudaScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
