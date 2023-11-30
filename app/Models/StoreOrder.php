<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total',
        'address',
        'phone',
        'status_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orderStatus() {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
