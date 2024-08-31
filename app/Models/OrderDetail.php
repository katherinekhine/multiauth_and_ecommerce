<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['product_order_id', 'product_id', 'quantity', 'price'];

    public function productOrder()
    {
        return $this->belongsTo(Order::class);
    }
}
