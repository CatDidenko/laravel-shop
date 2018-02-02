<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request)
    {
        $promoProducts = Product::where('status', '=', 'PROMO')->limit(9)->get();

        return view('welcome', ['products' => $promoProducts]);
    }

    public function search(Request $request)
    {
        $category = $request->category;

        $products = Product::whereHas('category', function($query) use($category){
            $query->when($category, function ($query) use ($category){
            $query->where('name', $category);
        });
      })->search($request->search)->with('category');

      $categories = $products->get()->pluck('category.name', 'category.slug')->toArray();

      $products = $products->paginate(2);

      return view('welcome', ['filter' =>$categories , 'products' => $products]);

    }
    
}
