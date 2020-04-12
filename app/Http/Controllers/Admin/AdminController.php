<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\product;
use App\slider;
use App\order;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function add_category()
    {
        return view('admin.add_category');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('admin.all_categories', [ 'categories' => $categories ]);
    }

    public function edit_category($id)
    {
        $select_category = Category::where('id', $id)->first();
        return view('admin.edit_category',['select_category' => $select_category]);
    }

    public function add_product()
    {
        $categories = Category::all();
        return view('admin.add_product', [ 'categories' => $categories ]);
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.all_products', [ 'products' => $products ]);
    }

    public function edit_product($id)
    {
        $categories = Category::all();
        $select_product = Product::where('id', $id)->first();
        return view('admin.edit_product', [ 'categories' => $categories , 'select_product' => $select_product ]);
    }

    public function add_slider()
    {
        return view('admin.add_slider');
    }

    public function sliders()
    {
        $sliders = Slider::all();
        return view('admin.all_sliders', [ 'sliders' => $sliders]);
    }

    public function edit_slider($id)
    {   
        $select_slider = Slider::where('id', $id)->first();
        return view('admin.edit_slider', ['select_slider' => $select_slider]);
    }

    public function orders(){
        $orders = Order::all();
        return view('admin.all_orders',  [ 'orders' => $orders]);
    }
}
