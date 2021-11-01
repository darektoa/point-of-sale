<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function store(Request $request) {
        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
        ]);

        return back();
    }
}
