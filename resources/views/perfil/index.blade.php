@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}"  method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold"> Username</label>
                    <input type="text" name="username" id="username" placeholder="Tu username" class="w-100 border p-3 w-full rounded-lg @error  ('username')
                        border-red-800
                    @enderror" value="{{auth()->user()->username}}">
                </div>
                @error('username')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror


                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold"> Imagen Perfil</label>
                    <input type="file" name="imagen" id="imagen"  class="w-100 border p-3 w-full rounded-lg @error  ('name')
                        border-red-800
                    @enderror" value="" accept=".jpeg, .jpg, .png">
                </div>



                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold"> email</label>
                    <input type="text" name="email" id="email" placeholder="Tu email" class="w-100 border p-3 w-full rounded-lg @error  ('email')
                        border-red-800
                    @enderror" value="{{auth()->user()->email}}">
                </div>
                @error('email')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror
                
                <input type="submit" value="Guardar Cambios" class="bg-black hover:bg-gray-800 uppercase font-bold w-full p-3 text-white rounded-lg"> 
                
            </form>

        </div>
    </div>
@endsection