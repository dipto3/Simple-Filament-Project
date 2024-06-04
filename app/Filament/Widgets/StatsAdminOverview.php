<?php

namespace App\Filament\Widgets;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Country', Country::count()),
            Stat::make('State', State::count()),
            Stat::make('City', City::count()),
        ];
    }
}
