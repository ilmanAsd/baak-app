<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Page;
use App\Services\TemplateRegistry;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $sectionData = [];
        $fixedColumns = ['title', 'slug', 'template_key', 'is_active'];

        // Extract section data (all fields that are not fixed columns)
        foreach ($data as $key => $value) {
            if (!in_array($key, $fixedColumns)) {
                $sectionData[$key] = $value;
                unset($data[$key]);
            }
        }

        // Create Page record
        $record = static::getModel()::create($data);

        // Create sections
        foreach ($sectionData as $key => $value) {
            $record->sections()->create([
                'section_key' => $key,
                'content' => $value,
            ]);
        }

        return $record;
    }
}
