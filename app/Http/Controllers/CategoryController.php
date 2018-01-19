<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getCategoryProducts($slug, Request $request)
    {
        $categories = Category::all();

        $products = Product::whereHas('category', function($category)use($slug){
            $category->where('slug', '=', $slug);
        })->paginate(2);

        if ($request->ajax()) {
            return view('category', ['categories' => $categories, 'products' => $products])->render();
        }
        return view('category', ['categories' => $categories, 'products' => $products]);
    }
}
