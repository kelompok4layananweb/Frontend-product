<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProducttsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'merek' => 'required',
            'min_stock' => 'required',
            'price' => 'required',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201); // Created status code
    }


    /**
     * Display the specified resource.
     */
    public function show($id) // Enforce integer for ID type safety
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404); // Not Found status code
        }

        return response()->json($product, 200); // OK status code
    }
    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id) // Enforce integer for ID type safety
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404); // Not Found status code
        }

        $validated = $request->validate([
            'name' => 'nullable', // Allow optional name update
            'merek' => 'nullable', // Allow optional brand update
            'min_stock' => 'nullable', // Allow optional minimum stock update
            'price' => 'nullable', // Allow optional price update
        ]);

        $product->update($validated);

        return response()->json($product->fresh(), 200); // OK status code with refreshed data
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
