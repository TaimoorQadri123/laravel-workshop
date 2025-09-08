<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class ProductController extends Controller
{
    
    public function Index(){
        $categories = product::all();

        return view('admin.product',["category"=>$categories]);
    }

    public function showCategory(){

        $categories = category::all();

        return view('admin.addproduct',["category"=>$categories]);
    }
}
