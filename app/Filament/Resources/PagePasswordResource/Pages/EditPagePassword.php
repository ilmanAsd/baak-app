<?php

namespace App\Filament\Resources\PagePasswordResource\Pages;

use App\Filament\Resources\PagePasswordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPagePassword extends EditRecord
{
    protected static string $resource = PagePasswordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
