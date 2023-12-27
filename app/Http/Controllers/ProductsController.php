<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    public function index() {
        return view('products.index');
    }

    public function create() {
        return view('products.create');
    }

    public function store(ProductRequest $request) {

    }
  }
