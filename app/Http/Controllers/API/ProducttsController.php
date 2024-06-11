<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
    $data = $products->map(function($product, $key) {
        return [
            'DT_RowIndex' => $key + 1,
            'name' => $product->name,
            'merek' => $product->merek,
            'price' => $product->price,
            'action' => '<div class="action-btn">' .
                            '<a href="' . route('master.produk.edit', $product->id) . '" class="text-info edit">' .
                                '<i class="ti ti-edit fs-5"></i>' .
                            '</a>' .
                            '<form action="' . route('master.produk.destroy', $product->id) . '" method="POST" class="d-inline-block">' .
                                csrf_field() .
                                method_field('DELETE') .
                                '<button type="submit" class="text-dark delete ms-2 btn-delete">' .
                                    '<i class="ti ti-trash fs-5"></i>' .
                                '</button>' .
                            '</form>' .
                        '</div>'
        ];
    });

    return response()->json(['data' => $data], 200);
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
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404); // Not Found status code
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted'], 200); // OK status code
    }
}
