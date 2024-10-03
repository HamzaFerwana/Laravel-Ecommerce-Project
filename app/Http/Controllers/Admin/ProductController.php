<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $products = Product::latest('id')->paginate(4);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'image' => 'required|image'
        ]);
        $image = $request->file('image')->store('uploads/products', 'custom');
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $image
        ]);
        return redirect()->route('admin.products.index')->with(['msg' => 'Product created.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image'
        ]);
        $image = $product->image;
        if($request->hasFile('image')) {
        $image = $request->file('image')->store('uploads/products', 'custom');
        }
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $image
        ]);
        return redirect()->route('admin.products.index')->with(['msg' => 'Product updated.', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index')->with(['msg' => 'Product deleted.', 'type' => 'danger']);
    }
}
