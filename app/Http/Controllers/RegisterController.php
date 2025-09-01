<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    function register(){
         return view('website.register');
    }

    function registerusers(Request $request){
                //dd($request); // dump or Die

                $validated = $request->validate([
                    'name' => 'required',
                     'email' => 'required',
                     'password' => 'required',
                     'retype_password' => 'required',
                ]);
    }

    function login(){
        return view('website.login');
    }
}
