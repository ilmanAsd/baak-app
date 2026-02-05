<?php

namespace App\Filament\Resources\StudentDocumentCategoryResource\Pages;

use App\Filament\Resources\StudentDocumentCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStudentDocumentCategories extends ManageRecords
{
    protected static string $resource = StudentDocumentCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
