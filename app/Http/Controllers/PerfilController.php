<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, User $user)
    {
         
        return view('perfil.index');
    }

    public function store(Request $request )
    {
        $request->request->add(['username'=>Str::slug($request->username)]);
        $this->validate($request,[
            'username'=>['required','unique:users,username,'. auth()->user()->id,'min:3','max:20','not_in:facebook,editar-perfil'],
            'email'=>['required','unique:users,email,'. auth()->user()->id,'email','max:60'],
        ]);

        if($request->imagen){
            $imagen= $request->file('imagen');
            //crea un id unico
            $nombreImagen= Str::uuid(). "." . $imagen->extension();

            //crea la imagen
            $imagenServidor= Image::make($imagen);
            $imagenServidor->fit(1000,1000);

            //se crea la ruta para acceder a la imagen
            $imagenPath= public_path('perfiles') . '/' . $nombreImagen;
            
            //la ruta es lo que se guarda en el servidor
            $imagenServidor->save($imagenPath);

           
        }
        $usuario = User::find(auth()->user()->id);
        $usuario->username= $request->username;
        $usuario->imagen= $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->email= $request->email;

        $usuario->save();


        return redirect()->route('posts.index', $usuario->username);
    }
}
