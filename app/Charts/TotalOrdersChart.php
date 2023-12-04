<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use DateTime;

class TotalOrdersChart extends LarapexChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($orders)
    {
        $currentMonth = new DateTime();
        $previousMonth1 = (clone $currentMonth)->modify('-1 month');
        $previousMonth2 = (clone $currentMonth)->modify('-2 months');

        $totalOrdersCurrentMonth = $orders->where('status_id', 3)
            ->whereBetween('created_at', [$currentMonth->format('Y-m-01'), $currentMonth->format('Y-m-t')])
            ->sum('total');

        $totalOrdersPreviousMonth1 = $orders->where('status_id', 3)
            ->whereBetween('created_at', [$previousMonth1->format('Y-m-01'), $previousMonth1->format('Y-m-t')])
            ->sum('total');

        $totalOrdersPreviousMonth2 = $orders->where('status_id', 3)
            ->whereBetween('created_at', [$previousMonth2->format('Y-m-01'), $previousMonth2->format('Y-m-t')])
            ->sum('total');

        $chartData = [
            'Tháng ' . $previousMonth2->format('m') => $totalOrdersPreviousMonth2,
            'Tháng ' . $previousMonth1->format('m') => $totalOrdersPreviousMonth1,
            'Tháng ' . $currentMonth->format('m') => $totalOrdersCurrentMonth,
        ];

        return $chartData;
    }
}
