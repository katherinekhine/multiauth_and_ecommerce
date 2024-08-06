<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'description', 'price', 'brand_id', 'category_id'];

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
