<?php

namespace App\Filament\Resources\ArchiveSectionResource\Pages;

use App\Filament\Resources\ArchiveSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArchiveSection extends EditRecord
{
    protected static string $resource = ArchiveSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
