<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function save_category(Request $request)
    {
        Category::create(['category_name' => $request->post('category_name')]);

        return redirect('/add_category')->with('flash_message', 'This category is added successfully');
    }

    public function edit_category($id)
    {
        $select_category = Category::where('id', $id)->first();

        return view('admin.edit_category',['select_category' => $select_category]);
    }

    public function update_category(Request $request)
    {  
        $data = [];
        $data['category_name'] = $request->category_name;
        Category::where('id', $request->category_id)->update($data);
        
        return redirect('categories')->with('flash_message', 'This category is updated successfully');
    }

    public function delete_category($id)
    {
        Category::where('id', $id)->delete();
        
        return redirect('categories')->with('flash_message', 'This category is deleted successfully');        
    }

}
