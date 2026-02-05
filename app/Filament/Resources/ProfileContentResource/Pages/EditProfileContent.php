<?php

namespace App\Filament\Resources\ProfileContentResource\Pages;

use App\Filament\Resources\ProfileContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfileContent extends EditRecord
{
    protected static string $resource = ProfileContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
