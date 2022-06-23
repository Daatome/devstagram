@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}

@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center   md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                @if ($user->imagen)
                    <img src="{{ asset('perfiles/'. $user->imagen)}}" alt="imagen usuario">
                    
                @else
                    <img src="{{ asset('img/usuario.svg')}}" alt="imagen usuario">
                    
                @endif
            </div>
                <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col md:justify-center py-10 items-center md:py-10 md:items-start">
                    <div class="flex items-center gap-2">

                        <p class="text-gray-700 text-2xl mt-5">{{ $user->username}}</p>

                        @auth
                            @if ($user->id === auth()->user()->id)
                                <a href="{{ route('perfil.index') }}"> 

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                            @endif

                        @endauth
                    </div>
            

                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->followers()->count()}}
                        <span class="font-normal">@choice('Seguidor|Seguidores',$user->followers()->count() )</span>
                            
                        
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->following()->count()}}
                        <span class="font-normal">Siguiendo</span>

                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->posts->count()}}
                        
                        <span class="font-normal">Post</span>
                    </p>

                    @auth
                        @if ($user->id !==auth()->user()->id)
                            @if (!$user->siguiendo(auth()->user()))
                                
                            
                                <form action=" {{route('users.follow',$user)}}" method="POST">
                                    @csrf
                                    <input type="submit" class="bg-blue-600 text-white font-bold hover:bg-blue-800 rounded-lg px-3 py-1 cursor-pointer text-xs" value="Seguir">
                                </form>

                            @else
                                <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="bg-red-600 text-white font-bold hover:bg-red-800 rounded-lg px-3 py-1 cursor-pointer text-xs" value="Dejar De Seguir">
                                </form>

                            @endif

                        @endif


                    @endauth
                </div>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10 ">Publicaciones</h2>

        <x-listar-post :posts="$posts"/>

    </section>
@endsection