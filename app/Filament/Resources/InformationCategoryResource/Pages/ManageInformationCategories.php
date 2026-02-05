<?php

namespace App\Filament\Resources\InformationCategoryResource\Pages;

use App\Filament\Resources\InformationCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageInformationCategories extends ManageRecords
{
    protected static string $resource = InformationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
