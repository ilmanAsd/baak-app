<?php

namespace App\Filament\Resources\ExternalDocumentResource\Pages;

use App\Filament\Resources\ExternalDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExternalDocument extends EditRecord
{
    protected static string $resource = ExternalDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
