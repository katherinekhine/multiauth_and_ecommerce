<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('user.home.index', [
            'products' => Product::all(),
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
    }
}
