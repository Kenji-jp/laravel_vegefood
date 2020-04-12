<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
Use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function save_slider(Request $request)
    {
        $this->validate($request, [
            'slider_image' => 'image|nullable|max:1999'
        ]);

            if ($request->hasFile('slider_image')) {

                $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('slider_image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension; 
                $path = $request->file('slider_image')->storeAs('public/cover_images', $fileNameToStore);

                } else {
                    $fileNameToStore = 'noimage.jpg';
                }

            $data = [];
            $data['description_1'] = $request->description1;
            $data['description_2'] = $request->description2;
            $data['slider_image'] = $fileNameToStore;
            $data['status'] = $request->status;

            DB::table('sliders')->insert($data);
            return redirect('add_slider')->with('flash_message', 'This slider is added successfully');
        
    }

    public function unactivate_slider($id)
    {
        $data = [];
        $data['status'] = 0;
        Slider::where('id', $id)->update($data);
        return redirect('sliders')->with('flash_message', 'Slider unactivated successfully');
    }

    public function activate_slider($id){
        
        $data = [];
        $data['status'] = 1;
        Slider::where('id', $id)->update($data);
        return redirect('sliders')->with('flash_message', 'Slider activated successfully');
    }

    public function update_slider(Request $request){

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
            $data['description_1'] = $request->description_1;
            $data['description_2'] = $request->description_2;
            $data['status'] = $request->product_status;

            if($request->hasFile('product_image')){
                $select_image_name = DB::table('sliders')
                                        ->where('id', $request->slider_id)
                                        ->first();

                $data['slider_image'] = $fileNameToStore;

                if($select_image_name->slider_image != 'noimage'){
                    Storage::delete('public/cover_images/'.$select_image_name->slider_image);
                }
            }

            DB::table('sliders')
                ->where('id', $request->slider_id)
                ->update($data);

            return redirect('sliders')->with('flash_message', 'This slider is updated successfully');        
    }

    public function delete_slider($id)
    {
        Slider::where('id', $id)->delete();
        return redirect('sliders')->with('flash_message', 'This slider is deleted successfully');        
    }

}
