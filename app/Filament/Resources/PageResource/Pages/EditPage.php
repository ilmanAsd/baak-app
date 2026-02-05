<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Services\TemplateRegistry;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('preview')
                ->label('Preview Page')
                ->icon('heroicon-o-eye')
                ->url(fn(Model $record): string => route('page.show', $record->slug))
                ->openUrlInNewTab(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $sections = $this->record->sections;

        // Merge section content directly into the main data array
        foreach ($sections as $section) {
            $data[$section->section_key] = $section->content;
        }

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
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

        $record->update($data);

        // Update or create sections
        foreach ($sectionData as $key => $value) {
            $record->sections()->updateOrCreate(
                ['section_key' => $key],
                ['content' => $value]
            );
        }

        return $record;
    }
}
