<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        //create user =) 
      
        $attributes = request()->validate([
            'name'=>'required|max:255',
            'username'=>['required','max:255','min:3',Rule::unique('users','username')],
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|max:255|min:7'
        ]);
        $attributes['password']=bcrypt( $attributes['password']);
       $user =  User::create($attributes);

       auth()->login($user);

    
        return redirect('/')->with('success','you have succeffully registered!');
       
        // show him an alert meessage
       
       
    }
}
