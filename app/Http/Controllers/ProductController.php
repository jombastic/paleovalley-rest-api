<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        if (!Gate::allows('update-product')) {
            return response()->json([
                'message' => 'You are not allowed to create a product'
            ], 403);
        }

        $product = Product::create($request->validated());

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json($product);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        if (!Gate::allows('update-product')) {
            return response()->json([
                'message' => 'You are not allowed to update a product'
            ], 403);
        }

        $product = Product::find($id);
        if (empty($product)) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->update($request->validated());

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('update-product')) {
            return response()->json([
                'message' => 'You are not allowed to delete a product'
            ], 403);
        }

        $product = Product::find($id);
        if (empty($product)) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
