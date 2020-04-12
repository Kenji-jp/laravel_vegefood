<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\product;
use App\category;
use App\cart;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function save_product(Request $request)
    {
        if($request->product_category == 'Select category'){
            return redirect('add_product')->with('error_message', 'please select category');
        } else {

            $this->validate($request, [
                'product_image' => 'image|nullable|max:1999'
            ]);

            if ($request->hasFile('product_image')) {
                $filenameWithExt = $request->file('product_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('product_image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('product_image')->storeAs('public/cover_images', $fileNameToStore);
                } else {
                    $fileNameToStore = 'noimage.jpg';
                }

            $data = [];
            $data['product_name'] = $request->product_name;
            $data['product_price'] = $request->product_price;
            $data['product_category'] = $request->product_category;
            $data['product_image'] = $fileNameToStore;
            $data['status'] = $request->status;

            DB::table('products')->insert($data);
            return redirect('add_product')->with('flash_message', 'This category is added successfully');
        }
    }

    public function unactivate_product($id)
    {
        $data = [];
        $data['status'] = 0;
        Product::where('id', $id)->update($data);
        return redirect('products')->with('flash_message', 'Product unactivated successfully');       
    }
 
    public function activate_product($id)
    {
        $data = [];
        $data['status'] = 1;
        Product::where('id', $id)->update($data);
        return redirect('products')->with('flash_message', 'Product activated successfully');       
    }

    public function update_product(Request $request){

        $this->validate($request, [
            'product_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('product_image')) {
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension; 
            $path = $request->file('product_image')->storeAs('public/cover_images', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.jpg';
            }
            $data = [];
            $data['product_name'] = $request->product_name;
            $data['product_price'] =$request->product_price;
            $data['product_category'] = $request->product_category;
            $data['status'] = $request->product_status;

            if($request->hasFile('product_image')){
                $select_image_name = Product::where('id', $request->product_id)->first();
                $data['product_image'] = $fileNameToStore;

                if($select_image_name->product_image != 'noimage'){
                    Storage::delete('public/cover_images/'.$select_image_name->product_image);
                }
            }
            Product::where('id', $request->product_id)->update($data);

            return redirect('products')->with('flash_message', 'This product is updated successfully');        
    }
    public function delete_product($id)
    {
        Product::where('id', $id)->delete();
        return redirect('products')->with('flash_message', 'This product is deleted successfully');        
    }    
}
