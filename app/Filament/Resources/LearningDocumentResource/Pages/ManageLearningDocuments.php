<?php

namespace App\Filament\Resources\LearningDocumentResource\Pages;

use App\Filament\Resources\LearningDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLearningDocuments extends ManageRecords
{
    protected static string $resource = LearningDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
