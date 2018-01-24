<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use Auth;

class UserProfileController extends Controller
{
   public function getProfile()
   {
       $user  =  Auth::user();

       $orders = Order::with('products')->where('user_id', $user->id)->get();

       return view('user_profile', ['user' => $user, 'orders' => $orders]);
   }
}
