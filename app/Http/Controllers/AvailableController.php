<?php

namespace App\Http\Controllers;

use App\Models\Available;
use App\Models\Product;
use Illuminate\Http\Request;

class AvailableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('available.index', [
            'available' => Available::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('available.create', [
            'available' => new Available(),
            'product' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        Available::create($validatedData);
        return redirect(route('availables.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Available $available)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Available $available)
    {
        return view('available.create', [
            'available' => $available,
            'product' => Product::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Available $available)
    {
        $validatedData = $request->validate([
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        $available->update($validatedData);
        return redirect(route('availables.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Available $available)
    {
        $available->delete();
        return redirect(route('availables.index'));
    }
}
