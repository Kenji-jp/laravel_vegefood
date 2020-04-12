<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Slider;
use App\Product;
use App\Category;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:user');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all()->where('status', 1);
        $products = Product::where('status', 1)->take('8')->get();
        $categories = Category::all();

        return view('pages.home' ,['sliders' => $sliders, 'products' => $products, 'categories' => $categories]);
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::where('status', 1)->paginate(8);
        
        return view('pages.shop',['products' => $products, 'categories' => $categories]);
    }

    public function cart()
    {   
        if(!Session::has('cart')){
            return view('pages.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('pages.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function select_product_by_category($category_name)
    {
        $categories = Category::all();
        $products = Product::where('product_category', $category_name)
                            ->where('status', 1)
                            ->paginate(8);
                            

        return view('pages.shop', ['products' => $products, 'categories' => $categories]);
    }

    public function addToCart($id){
        $product = Product::where('id', $id)->first();

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/shop');
    }

    public function update_Qty(Request $request){
        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        return redirect::to('/cart');
    }

    public function removeItem($product_id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product_id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect('/cart');
    }

    //public function checkout()
    // {
        
    //     return view('pages.checkout');
    // }
}
