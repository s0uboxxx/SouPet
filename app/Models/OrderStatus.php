<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'statuses_order';
    protected $fillable = ['status'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_status');
    }
}
