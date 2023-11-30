<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'id_brand', 'price', 'description', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'id_product', 'id_category');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }

    public function storeOrders()
    {
        return $this->hasMany(StoreOrder::class, 'product_id');
    }

    public function productQuantities()
    {
        return $this->hasMany(ProductQuantity::class);
    }
}
