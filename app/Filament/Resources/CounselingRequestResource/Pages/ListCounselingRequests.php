<?php

namespace App\Filament\Resources\CounselingRequestResource\Pages;

use App\Filament\Resources\CounselingRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCounselingRequests extends ListRecords
{
    protected static string $resource = CounselingRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
