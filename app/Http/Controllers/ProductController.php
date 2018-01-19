<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function getProduct($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();

        return view('product', ['product' => $product]);
    }
}
