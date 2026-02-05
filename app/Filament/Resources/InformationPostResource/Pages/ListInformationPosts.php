<?php

namespace App\Filament\Resources\InformationPostResource\Pages;

use App\Filament\Resources\InformationPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformationPosts extends ListRecords
{
    protected static string $resource = InformationPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
