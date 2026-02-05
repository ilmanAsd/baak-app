<?php

namespace App\Filament\Resources\MkwuResource\Pages;

use App\Filament\Resources\MkwuResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMkwus extends ManageRecords
{
    protected static string $resource = MkwuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
