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

    public function search(Request $request)
    {
        $category = $request->category;
        
        $products = Product::whereHas('category', function($query) use($category){
            $query->when($category, function ($query) use ($category){
            $query->where('name', $category);
        });
      })->search($request->search)->with('category')->paginate(2);

      //var_dump($products);
      return view('search', ['products' => $products]);

    }
}
