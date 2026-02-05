<?php

namespace App\Filament\Resources\MbkmResource\Pages;

use App\Filament\Resources\MbkmResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMbkms extends ManageRecords
{
    protected static string $resource = MbkmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
