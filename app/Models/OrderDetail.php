<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];


    // OrderDetail belongs to an Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // OrderDetail belongs to a Product (assuming you have a Product model)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
