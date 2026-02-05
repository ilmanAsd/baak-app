<?php

namespace App\Filament\Resources\BaakProgramResource\Pages;

use App\Filament\Resources\BaakProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBaakPrograms extends ListRecords
{
    protected static string $resource = BaakProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
