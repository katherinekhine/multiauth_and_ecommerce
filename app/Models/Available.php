<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    use HasFactory;

    protected $fillable = ['size', 'color', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
