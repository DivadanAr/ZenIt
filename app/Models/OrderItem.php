<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];

    public function orders(){
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'products_id');
    }
}
