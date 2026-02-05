<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force Laravel to look in the root 'lang' directory
        app()->useLangPath(base_path('lang'));

        Schema::defaultStringLength(191);

        \Filament\Tables\Columns\TextColumn::configureUsing(function (\Filament\Tables\Columns\TextColumn $column): void {
            $column->wrap();
        });

        \Filament\Tables\Table::configureUsing(function (\Filament\Tables\Table $table): void {
            $table->searchDebounce('300ms');
        });
    }
}
