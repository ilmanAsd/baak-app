<?php

namespace App\Filament\Resources\StudentDocumentResource\Pages;

use App\Filament\Resources\StudentDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStudentDocuments extends ManageRecords
{
    protected static string $resource = StudentDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
