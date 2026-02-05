<?php

namespace App\Filament\Resources\CounselingScheduleResource\Pages;

use App\Filament\Resources\CounselingScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCounselingSchedule extends EditRecord
{
    protected static string $resource = CounselingScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
