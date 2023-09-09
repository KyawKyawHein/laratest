<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view("auth.register");
    }
    public function store(){
        $formData = request()->validate([
            "name"=>["required",'min:1',"max:255"],
            "username"=>['required','min:1','max:255',Rule::unique("users","username")],
            "email"=>['required','email',Rule::unique("users","email")],
            "password"=>['required','min:8'],
        ]);
        $user = User::create($formData);
        // session()->flash("success","Welcome".$user->name);

        auth()->login($user);

        return redirect('/')->with("success","Welcome".$user->name);
    }

    public function login(){
        return view("auth.login");
    }

    public function post_login(){
        //validate
        $formData=request()->validate([
            "email" =>['required','email','max:255',Rule::exists("users","email")],
            "password" =>['required','min:8'],
        ],[
            "email.required" => "Email is required",
            
        ]);
        if(auth()->attempt($formData)){
            return redirect("/")->with("success","Welcome Back");
        }else{
            return redirect()->back()->withErrors([
                "email" => "User Credentials wrong."
            ]);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with("success","Good Bye");
    }
}
