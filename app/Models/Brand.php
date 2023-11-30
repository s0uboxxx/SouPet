<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['brands'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'id_brand');
    }

    public function productsWithFood()
    {
        return $this->hasMany(Product::class, 'id_brand')
            ->whereDoesntHave('categories', function ($query) {
                $query->where('id_category', 4);
            });
    }

    public function productsWithToy()
    {
        return $this->hasMany(Product::class, 'id_brand')
            ->whereDoesntHave('categories', function ($query) {
                $query->where('id_category', 3);
            });
    }
}
