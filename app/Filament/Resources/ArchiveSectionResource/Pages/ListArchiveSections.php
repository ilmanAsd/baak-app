<?php

namespace App\Filament\Resources\ArchiveSectionResource\Pages;

use App\Filament\Resources\ArchiveSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArchiveSections extends ListRecords
{
    protected static string $resource = ArchiveSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
