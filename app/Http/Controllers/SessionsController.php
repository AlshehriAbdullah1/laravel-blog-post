<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{   
    //


    public function create(){
        
        auth()->logout();

        return view('sessions.create');
    }
    public function destroy(){
        
        auth()->logout();

        return redirect('/')->with('success','goodbye!');
    }
    public function store(){
        
        #attempt to authenticate the log in the user based on give credintals , 
        # also validate the reuqest 

            $attributes  =request()->validate(
                [
                    'email'=>'required|email',
                    'password'=>'required'
                ]
                );

                
                #redirect with success flash message
                
                                if(auth()->attempt($attributes)){
                                    session()->regenerate();
                                        return redirect('/')->with('success','Welcome Back!');
                                }

              return back()
              ->withInput()
              ->withErrors(['email'=>'your provided credentials could not be verified =( ']);
    }
}
