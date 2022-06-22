@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    
@endpush


@section('contenido')
    
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10 ">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white  rounded-lg shadow-lg mt-10 md:mt-0 mx-5">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold mt-3"> Nombre</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Tu titulo de la publicación" class="w-100 border p-3 w-full rounded-lg @error  ('titulo')
                        border-red-800
                    @enderror" value="{{old('titulo')}}">
                </div>
                @error('titulo')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold"> Descripción</label>
                    <textarea  name="descripcion" id="descripcion" placeholder="Cuentanos un poco de la foto!" class="w-100 border p-3 w-full rounded-lg @error  ('titulo')
                        border-red-800
                        @enderror" 
                    >{{old('descripcion')}}</textarea>
                </div>
                @error('descripcion')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror

                <div class="mb-5">
                   <input  name="imagen" type="hidden" value="{{old('imagen')}}"> 
                   @error('imagen')
                    <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                       {{$message}}
                    </p>
                @enderror
                </div>

                <input type="submit" value="Publicar" class="bg-black hover:bg-gray-800 uppercase font-bold w-full p-3 text-white rounded-lg my-10"> 


            </form>
        </div>
    </div>

@endsection