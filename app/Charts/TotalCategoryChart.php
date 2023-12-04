<?php

namespace App\Charts;

use App\Models\Category;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\ProductCategory;

class TotalCategoryChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): array
    {
        $categories = Category::all();
        $categoryProductCount = [];

        foreach ($categories as $category) {
            $productCount = ProductCategory::where('id_category', $category->id)->count();
            $categoryProductCount[$category->name] = $productCount;
        }

        return $categoryProductCount;
    }
}
