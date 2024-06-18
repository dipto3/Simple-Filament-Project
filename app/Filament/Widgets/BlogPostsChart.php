<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
 

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Employee Chart';

    protected function getData(): array
    {
        // return [
        //     'datasets' => [
        //         [
        //             'label' => 'Employee Joined',
        //             'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
        //         ],
        //     ],
        //     'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        // ];
        $data = Trend::model(Employee::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
 
    return [
        'datasets' => [
            [
                'label' => 'Employee Joined',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
