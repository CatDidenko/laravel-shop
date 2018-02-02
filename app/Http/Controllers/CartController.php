<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
use Validator;
use Auth;
use App\Mail\OrderShipped;
use Mail;

use App\Models\Product;
use App\Models\Order;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your cart!');
        }
        Cart::add($request->id, $request->title, 1, $request->price)->associate(Product::class);

        return redirect('cart')->withSuccessMessage('Item was added to your cart!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);
         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }
        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Item has been removed!');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    }

    public function submitCheckout()
    {
        \DB::beginTransaction();

        try {
                $products = Cart::instance('default')->content()->pluck('qty', 'id')->all();
                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->save();

                foreach($products as $key => $value)
                {
                    $order->products()->attach($key, ['count' => $value]);
                    $product = Product::find($key);
                    $product->decrement('count', $value);
                }

                Mail::to(Auth::user()->email)->send(new OrderShipped($order));

                Cart::destroy();

                \DB::commit();

                return redirect('cart')->withSuccessMessage('Your order has been succesful created!');

            } catch (\Exception $ex) {
                \DB::rollback();
                return redirect('cart')->withErrorMessage('An unexpected error occurred.');
            }
    }
}
