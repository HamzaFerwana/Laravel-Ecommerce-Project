<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => 1,
            'message' => 'All Products',
            'count' => $products->count(),
            'data' => $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }
        $image = $request->file('image')->store('uploads/api/products', 'custom');
        $product = Product::create([
            'image' => $image,
            'name' =>  $request->name,
            'price' => $request->price
        ]);
        if ($product) {
            return response()->json([
                'status' => 1,
                'message' => 'Product Created',
                'data' => $product
            ], 201);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Failed To Create Product',
            'data' => []
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 1,
                'message' => 'Product ' . $id,
                'data' => $product
            ], 200);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Product Not Found',
            'data' => []
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        if ($product) {
            return response()->json([
                'maeeage' => 1,
                'status' => 'Product updated',
                'data' => $product
            ], 200);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Product Not Found',
            'data' => []
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::destroy($id);
        if ($product) {
            return response()->json([
                'status' => 1,
                'message' => 'Product Deleted',
                'data' => []
            ], 200);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Product Not Found',
            'data' => []
        ], 404);
    }

    public function login(Request $request)
    {
        $login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($login) {
            $token = $request->user()->createToken('API_Access_Token');
            return response()->json([
                'status' => 1,
                'message' => 'Token created',
                'token' => $token->plainTextToken
            ], 200);
        }

        return response()->json([
            'status' => 0,
            'message' => 'User is not registered on the system'
        ], 404);
    }
}
