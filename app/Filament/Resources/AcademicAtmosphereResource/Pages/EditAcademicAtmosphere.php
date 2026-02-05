<?php

namespace App\Filament\Resources\AcademicAtmosphereResource\Pages;

use App\Filament\Resources\AcademicAtmosphereResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcademicAtmosphere extends EditRecord
{
    protected static string $resource = AcademicAtmosphereResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
