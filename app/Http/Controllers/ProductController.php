<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = [
            [
                'name'      => 'Biskuat',
                'price'     => 10000,
                'created_at'=> '28/11/21'
            ], [
                'name'      => 'Roma',
                'price'     => 8000,
                'created_at'=> '20/08/21'
            ],
        ];

        return view('products.index', compact('products'));
    }
}
