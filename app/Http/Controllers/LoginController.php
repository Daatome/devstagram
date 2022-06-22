<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){


        //validacion
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        //si no se puede autenticar entonces manda el mensaje de error
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            //el back es una forma de regresar a la pagina anterior con datos de vuelta
            return back()->with('mensaje','Credenciales Incorrectas');
        }

        return redirect()->route('posts.index',[
            'user'=>auth()->user()->username
        ]);
    }
}
