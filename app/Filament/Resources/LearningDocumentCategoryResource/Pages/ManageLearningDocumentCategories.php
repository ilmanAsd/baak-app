<?php

namespace App\Filament\Resources\LearningDocumentCategoryResource\Pages;

use App\Filament\Resources\LearningDocumentCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLearningDocumentCategories extends ManageRecords
{
    protected static string $resource = LearningDocumentCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
