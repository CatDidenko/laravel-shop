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

        if($request->price_min && $request->price_max)
        {
            $products = Product::whereHas('category', function($category)use($slug){
                $category->where('slug', '=', $slug);
            })->whereBetween('price', [$request->price_min,$request->price_max])->sortable()->paginate(2);
        }else{
            $products = Product::whereHas('category', function($category)use($slug){
                $category->where('slug', '=', $slug);
            })->sortable()->paginate(2);
        }

        return view('category', ['categories' => $categories, 'products' => $products, 'slug' => $slug]);
    }
}
