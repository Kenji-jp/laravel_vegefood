<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
  
    public function checkout()
    {
        if(!Session::has('cart')){
            return view('pages.cart');
        }
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('pages.checkout', ['totalPrice' => $cart->totalPrice]);
    }

    public function postCheckout(Request $request){

        if(!Session::has('cart')){
            return redirect('cart');           
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_dcqTDVwP1DpyqyDKde5LB64r00SL8sV9x7');

        try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

            $data = [];
            $data['name'] = $request->name;
            $data['address'] = $request->address;
            $data['cart'] = serialize($cart);
            $data['payment_id'] = $charge->id;

            DB::table('orders')
                ->insert($data);


        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/checkout');
        }

        Session::forget('cart');
        Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/');
    }
}