<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        // dd($products);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();

        if ($request->has('image')) {
            $rename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/product/', $rename);
            Image::make(('uploads/product/' . $rename))->resize(450, 450)->save(('uploads/resize/' . $rename));
            $product->image = $rename;

            // dd($rename);
        } else {
            $product->image = "https://via.placeholder.com/450x450.png";
        }

        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        // dd($product->image);
        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->image) {
                File::delete(('uploads/product/' . $product->image));
                File::delete(('uploads/resize/' . $product->image));
            }

            $rename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/product/', $rename);
            Image::make(('uploads/product/' . $rename))->resize(450, 450)->save(('uploads/resize/' . $rename));

            $product->image = $rename;
        } else {
            $product->image = 'https://via.placeholder.com/450x450.png';
        }

        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image != NULL) {
            File::delete('uploads/product/' . $product->image);
            File::delete('uploads/resize/' . $product->image);
        }

        $product->delete();
        return redirect('/products');
    }
}
