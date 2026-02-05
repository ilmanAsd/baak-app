<?php

namespace App\Filament\Resources\MahasiswaAsingPageResource\Pages;

use App\Filament\Resources\MahasiswaAsingPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMahasiswaAsingPages extends ListRecords
{
    protected static string $resource = MahasiswaAsingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
