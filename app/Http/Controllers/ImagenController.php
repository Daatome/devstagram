<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){

        $imagen= $request->file('file');
        //crea un id unico
        $nombreImagen= Str::uuid(). "." . $imagen->extension();

        //crea la imagen
        $imagenServidor= Image::make($imagen);
        $imagenServidor->fit(1000,1000);

        //se crea la ruta para acceder a la imagen
        $imagenPath= public_path('uploads') . '/' . $nombreImagen;
        
        //la ruta es lo que se guarda en el servidor
        $imagenServidor->save($imagenPath);


        return response()->json(['imagen'=> $nombreImagen]);
    }
}
