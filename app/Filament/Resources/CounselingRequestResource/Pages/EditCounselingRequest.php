<?php

namespace App\Filament\Resources\CounselingRequestResource\Pages;

use App\Filament\Resources\CounselingRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCounselingRequest extends EditRecord
{
    protected static string $resource = CounselingRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
