<?php

namespace App\Filament\Resources\ExternalDocumentResource\Pages;

use App\Filament\Resources\ExternalDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExternalDocuments extends ListRecords
{
    protected static string $resource = ExternalDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
