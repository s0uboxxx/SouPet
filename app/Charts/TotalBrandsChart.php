<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Brand;
use App\Models\Product;

class TotalBrandsChart extends LarapexChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): array
    {
        $brands = Brand::all();
        $brandProductCount = [];

        foreach ($brands as $brand) {
            $productCount = Product::where('id_brand', $brand->id)->count();
            $brandProductCount[$brand->name] = $productCount;
        }

        return $brandProductCount;
    }
}
