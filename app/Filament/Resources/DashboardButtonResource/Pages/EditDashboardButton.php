<?php

namespace App\Filament\Resources\DashboardButtonResource\Pages;

use App\Filament\Resources\DashboardButtonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDashboardButton extends EditRecord
{
    protected static string $resource = DashboardButtonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
