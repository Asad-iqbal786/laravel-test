<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    
 
    public function products()
    {
       return $this->belongsTo('App\Models\Product','product_id');
    }
    public function users()
    {
       return $this->belongsTo('App\Models\User','user_id');
    }
}
