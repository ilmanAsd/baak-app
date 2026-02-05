<?php

namespace App\Filament\Resources\ProfileContentResource\Pages;

use App\Filament\Resources\ProfileContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfileContents extends ListRecords
{
    protected static string $resource = ProfileContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
