<?php

namespace App\Filament\Resources\DashboardButtonResource\Pages;

use App\Filament\Resources\DashboardButtonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDashboardButtons extends ListRecords
{
    protected static string $resource = DashboardButtonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
