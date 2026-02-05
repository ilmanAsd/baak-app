<?php

namespace App\Filament\Resources\BaakProgramResource\Pages;

use App\Filament\Resources\BaakProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBaakProgram extends EditRecord
{
    protected static string $resource = BaakProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
