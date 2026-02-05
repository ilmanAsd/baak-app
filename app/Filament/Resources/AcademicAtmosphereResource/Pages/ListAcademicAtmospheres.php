<?php

namespace App\Filament\Resources\AcademicAtmosphereResource\Pages;

use App\Filament\Resources\AcademicAtmosphereResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademicAtmospheres extends ListRecords
{
    protected static string $resource = AcademicAtmosphereResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
