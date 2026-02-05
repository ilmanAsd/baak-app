<?php

namespace App\Filament\Resources\PagePasswordResource\Pages;

use App\Filament\Resources\PagePasswordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPagePasswords extends ListRecords
{
    protected static string $resource = PagePasswordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
