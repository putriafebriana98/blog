<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegistrationForm;
use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;


class RegistrationController extends Controller
{
    //
    public function create(){
        return view('registration.create');
    }
    public function store(RegistrationForm $form){
        $form->persist();

        session()->flash('message','You have registered');
        //redirect to the home page
        return redirect()->home();
    }
}
