<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'description', 'price', 'brand_id', 'category_id', 'size', 'color', 'quantity'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function availables()
    {
        return $this->hasMany(Available::class);
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
