<?php

namespace App\Filament\Widgets;

use App\Models\DashboardButton;
use Filament\Widgets\Widget;

class DashboardButtonsWidget extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-buttons-widget';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = -2; // Ensure it shows at the top

    public function getViewData(): array
    {
        return [
            'buttons' => DashboardButton::where('is_active', true)
                ->orderBy('sort_order')
                ->get(),
        ];
    }
}
