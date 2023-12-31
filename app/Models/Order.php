<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

        // Order model
    public function sellers()
    {
        return $this->belongsToMany(User::class, 'order_seller', 'order_id', 'seller_id');
    }

}
