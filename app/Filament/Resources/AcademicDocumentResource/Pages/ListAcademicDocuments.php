<?php

namespace App\Filament\Resources\AcademicDocumentResource\Pages;

use App\Filament\Resources\AcademicDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademicDocuments extends ListRecords
{
    protected static string $resource = AcademicDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
