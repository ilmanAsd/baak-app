<?php

namespace App\Filament\Resources\CounselingScheduleResource\Pages;

use App\Filament\Resources\CounselingScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCounselingSchedules extends ListRecords
{
    protected static string $resource = CounselingScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
