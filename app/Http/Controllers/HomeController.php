<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $categories = Category::all();
        $promoProducts = Product::where('status', '=', 'PROMO')->limit(9)->get();

        return view('welcome', ['categories' => $categories, 'promo' => $promoProducts]);
    }
}
