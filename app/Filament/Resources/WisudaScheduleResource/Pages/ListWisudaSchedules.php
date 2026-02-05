<?php

namespace App\Filament\Resources\WisudaScheduleResource\Pages;

use App\Filament\Resources\WisudaScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWisudaSchedules extends ListRecords
{
    protected static string $resource = WisudaScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
