<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create', [
            'product' => new Product(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photo_path;
        }

        Product::create($validatedData);

        return redirect(route('products.index'));
    }

    public function storeFromPurchase(StoreProductRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photo_path;
        }

        Product::create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.create', [
            'product' => $product,
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('photos', 'public');
            $product->photo = $photo_path;
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $product->photo,
            'price' => $request->price,
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
