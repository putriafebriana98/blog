<?php

namespace App\Http\Controllers;
use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;


class RegistrationController extends Controller
{
    //
    public function create(){
        return view('registration.create');
    }
    public function store(){
        //validate
        $this->validate(request(),[
            'name' =>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);
        $name=request('name');
        $email=request('email');
        $password=bcrypt(request('password'));
        //create and save the user
        $user= User::create(array('name'=>$name,'email'=>$email,'password'=>$password));
        //sign them

        auth()->login($user);
        Mail::to($user)->send(new Welcome($user));

        //redirect to the home page
        return redirect()->home();
    }
}
