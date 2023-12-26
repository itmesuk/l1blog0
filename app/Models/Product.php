<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function rOder() {
        return $this->belongsTomany(Order::class,OrderDetail::class,'productID', 'orderId');
    }
}
