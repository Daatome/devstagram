@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection
@section('contenido')
    <div class="container mx-auto md:flex ">
        <div class="md:w-1/2 mx-10">
            <img src="{{ asset('uploads').'/'. $post->imagen }}" alt="imagen de {{$post->titulo}}">


            <div class="p-3 flex items-center">
                @auth
                    <livewire:like-post  :post="$post" />
                    
                @endauth

            </div>
            <div>
                <!-- uso de la relacion entre post y user -->
                <p class="font-bold ">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500 ">{{$post->created_at->diffForHumans()}}</p>
                <p>{{$post->descripcion}}</p>
            </div>

            @auth
                @if ($post->user_id===auth()->user()->id)
                    
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar Publicación" class="bg-red-500 hover:bg-red-600 text-white p-2 rounder font-bold mt-4 cursor-pointer">
                    </form>
                @endif

            @endauth

        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    
                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                @if (session('mensaje'))
                    <div class="bg-green-500 p2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{session('mensaje')}}
                    </div>
                @endif

                <form action="{{ route('comentarios.store',['post'=>$post,'user'=>$user]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold"> Comentario</label>
                        <textarea  name="comentario" id="comentario" placeholder="Escribir comentario!" class="w-100 border p-3 w-full rounded-lg @error  ('titulo')
                            border-red-800
                            @enderror" 
                        ></textarea>
                    </div>
                    @error('comentario')
                        <p class="text-white bg-red-800 font-bold rounded-lg text-center mx-2">
                           {{$message}}
                        </p>
                    @enderror


                    <input type="submit" value="Comentar" class="bg-black hover:bg-gray-800 uppercase font-bold w-full p-3 text-white rounded-lg my-10"> 

                </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <p class="font-bold "><a  class="hover:border-b hover:border-black" href="{{ route('posts.index', ['user'=>$comentario->user->username]) }}">{{$comentario->user->username}}</a></p>
                                <p>{{$comentario->comentario}}</p>
                                <p class="text-sm ">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else

                        <p class="p-10 text-center">No hay comentarios aun </p>
                        
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
