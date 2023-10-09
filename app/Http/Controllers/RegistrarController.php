<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    // 
    public function index() {
        return view('auth.registrarse');
        
    }
    public function store(Request $request) {
        //dd('Post...');
        //haciendo la validacion 
        $this->validate($request,[
            'name'=>'required | min:7',
            'lastname'=>'required| min:7',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required| min:8|confirmed',
            'password_confirmation'=>'required| min:8',

        ]);
      User::create([
        'name'=>$request->name,
        'lastname'=>$request->lastname,
        'email'=>$request->email,
        'password'=>$request->password,
      ]) ; 


        //Autentificar un usuario 
        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        //redireccionar al muro =pizarra 
      return redirect()->route('posts.index');
    }
}
