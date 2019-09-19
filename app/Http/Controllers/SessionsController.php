<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }

    public function create(){
        return view('sessions.create');
    }
    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
    public function store(){

        //attempt to authenticate the user
        if(!auth()->attempt(request(['email','password']))){
            return back()->withErrors([
                'message'=>'please check your credential and try againddd.'
            ]);
        }
        //if not, redirect back

        //if yes,redirect to home page
        redirect()->home();
    }
}
