<?php

namespace App\Filament\Resources\StudyProgramDocumentSettingResource\Pages;

use App\Filament\Resources\StudyProgramDocumentSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStudyProgramDocumentSettings extends ManageRecords
{
    protected static string $resource = StudyProgramDocumentSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
