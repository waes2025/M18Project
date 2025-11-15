<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getProductList()
    {
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(5);

        return view('product.index', ['products' => $products]);
    }

    public function getProductShow($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product){
            return redirect()->route('products.list')->with('error', 'Product not found.');
        }

        return view('product.show', ['product' => $product]);
    }

    public function getProductCreate()
    {
        return view('product.create');
    }

    public function postProductStore(Request $request)
    {
        $product_id = $request->product_id;
        $imagePath = null;
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $stock = $request->stock;

        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products_images','public');
        }

        DB::table('products')->insert([
            'product_id' => $product_id,
            'name' => $name,
            'description' => $description,
            'image' => $imagePath,
            'price' => $price,
            'stock' => $stock,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('products.list')->with('success', 'Product created successfully.');
    }

    public function getProductEdit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product){
            return redirect()->route('products.list')->with('error', 'Product not found.');
        }

        return view('product.edit', ['product' => $product]);
    }

    public function putProductUpdate(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product){
            return redirect()->route('products.list')->with('error', 'Product not found.');
        }

        $imagePath = $product->image;

        if ($request->hasFile('image')){
            if ($product->image){
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products_images','public');
        }

        DB::table('products')->where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'image' => $imagePath,
            'updated_at' => now()
        ]);

        return redirect()->route('products.list')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product){
            return redirect()->route('products.list')->with('error', 'Product not found.');
        }

        if ($product->image){
            Storage::disk('public')->delete($product->image);
        }

        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('products.list')->with('success', 'Product deleted successfully.');
    }
}
