<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        // dd($request->all());


        if ($request->hasFile('image')) {
            $rename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            // $request->file('image')->move('uploads/product/', $rename);

            // Image::make(('uploads/product/' . $rename))->resize(450, 450)->save(('uploads/resize/' . $rename));
            // $product->image = $rename;

        } else {
            $product->image = "https://via.placeholder.com/450x450.png";
        }

        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->stock = $request->stock;
        // $product->save();
        dd($product->image);
        return redirect('/products');
    }
}