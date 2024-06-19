<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Pages\Dashboard as BasePage;
 
class Dashboard extends BasePage
{
    use HasFiltersForm;

    public static function canView(): bool
    {
        return auth()->user()->hasRole('Admin');
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Country', Country::count())->chart([1,12,30,2])->color('success'),
            // Stat::make('State', State::count()),
            // Stat::make('City', City::count()),
        ];
    }
}
