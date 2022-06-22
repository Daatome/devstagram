@extends('layouts.app')

@section('titulo')
    Inica Sesión en DevStagram
@endsection

@section('contenido')
    
    <div class="md:flex justify-center items-center gap-3">
        <div class="md:w-6/12">
            <img src="{{ asset('img/login.jpg') }}" alt="ImagenLogin" class="rounded-lg">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg ">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje'))
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                        {{session('mensaje')}}
                    </p> 
                @endif

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
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center m-2">
                       {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <input type="checkbox" name="remember"> 
                    <label  class="text-gray-500 text-sm">Mantener mi sesión abierta</label> 
                </div>

                

                <input type="submit" value="Iniciar Sesión" class="bg-black hover:bg-gray-800 uppercase font-bold w-full p-3 mb-2 text-white rounded-lg"> 


            </form>
        </div>
    </div>


@endsection