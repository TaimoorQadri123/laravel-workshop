<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    //
    public function Index(){
        $categories = category::all();

        return view('admin.category',["category"=>$categories]);
    }

    public function store(Request $request){
                $validated = $request->validate([
                    'cat_name' => 'required|unique:categories,cat_name',
                     'cat_image' => 'required|image|mimes:jpg,png',
                ]);

            $categoryName = time().'.'.$request->cat_image->extension();
            //1234.jpg
            //move into folder
            $request->cat_image->move(public_path('uploads/'),$categoryName);

            //Insert Into Table
            $category = new category();
            $category->cat_name = $request->cat_name;
            $category->cat_image = $categoryName;

            $category->save();

            return redirect()->back()->with('success','Category Uploaded Successfully');
    }


    public function delete($id){
        //Where Clause
        $delete = category::findOrFail($id);

        if(file_exists(public_path('uploads/'.$delete->cat_image))){
            //Folder -> Image -> Delete
            unlink(public_path('uploads/'.$delete->cat_image));

        }
        //Query For Delete
        $delete->delete();

        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
