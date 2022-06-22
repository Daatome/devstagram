@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    
    <div class="md:flex justify-center items-center gap-3">
        <div class="md:w-6/12">
            <img src="{{ asset('img/registrar.jpg') }}" alt="imagenRegistro" class="rounded-lg">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg ">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold"> Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Tu nombre" class="w-100 border p-3 w-full rounded-lg @error  ('name')
                        border-red-800
                    @enderror" value="{{old('name')}}">
                </div>
                @error('name')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror
                    
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold"> Username</label>
                    <input type="text" name="username" id="username" placeholder="Tu nombre de usuario" class="w-100 border p-3 w-full rounded-lg @error('username')
                        border-red-800
                    @enderror" value="{{old('username')}}">
                </div>
                @error('username')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror
                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold"> Email</label>
                    <input type="text" name="email" id="email" placeholder="Tu email" class="w-100 border p-3 w-full rounded-lg @error('email')
                        border-red-800
                    @enderror" value="{{old('email')}}">
                </div>
                @error('email')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold"> Password</label>
                    <input type="password" name="password" id="password" placeholder="Tu password" class="w-100 border p-3 w-full rounded-lg @error('password')
                    border-red-800
                    @enderror" >
                </div>
                @error('password')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold"> Repite Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmatioss" placeholder="Repite tu password" class="w-100 border p-3 w-full rounded-lg ">
                </div>

                <input type="submit" value="Crear Cuenta" class="bg-black hover:bg-gray-800 uppercase font-bold w-full p-3 text-white rounded-lg"> 


            </form>
        </div>
    </div>


@endsection