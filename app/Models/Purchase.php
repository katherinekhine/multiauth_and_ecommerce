<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_name', 'product_id'];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
