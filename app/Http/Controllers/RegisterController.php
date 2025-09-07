<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
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
                     'email' => 'required|email|unique:registers,email',
                     'password' => 'required',
                     'retype_password' => 'required|same:password',
                ]);


                Register::create([
                    'name' =>  $request->name,
                    'email' =>  $request->email,
                    'password' =>  $request->password,
                    'role' =>  'user'
                ]);

                return redirect('/register')->with('success',"Account Created Successfully");

    }

    function login(){
        return view('website.login');
    }

    function loginfunction(Request $request){
        $validated = $request->validate([
                        
                        'email' => 'required|email',
                        'password' => 'required',
                    ]);

                $users = Register::Where('email',$request->email)->first();

                if($users->password == $request->password){
                    
                    // Role Base Login 

                    if($users->role == "admin"){

                      session([
                            "adminrole" =>$users->role 
                        ]);

                           return redirect('/admin');


                    }else{
                        session([
                            "userrole" =>$users->role 
                        ]);

                        return redirect('/');
                    }
                }


    }

    // Logout Function

    function logout(){
        session()->flush();

        return redirect('/');
    }


}
