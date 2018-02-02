<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function getProduct($slug)
    {
        $categories = Category::all();

        $product = Product::with('category')->where('slug', '=', $slug)->first();
        
        return view('product2', ['product' => $product, 'categories' => $categories]);
    }
}
