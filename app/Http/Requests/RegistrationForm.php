<?php

namespace App\Http\Requests;

use App\Mail\Welcome;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->name;
        return [
            //
            'name' =>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ];
    }
    public function persist(){
        //validate

        $this['password']=bcrypt($this->password);

        $user=User::create($this->only('name','email','password'));
        //sign them

        auth()->login($user);
        Mail::to($user)->send(new Welcome($user));
    }
}
