<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'id_category', 'id_product');
    }

    public function productsWithFood()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'id_category', 'id_product')
            ->whereDoesntHave('categories', function ($query) {
                $query->where('id_category', 4);
            });
    }

    public function productsWithToy()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'id_category', 'id_product')
            ->whereDoesntHave('categories', function ($query) {
                $query->where('id_category', 3);
            });
    }
}
