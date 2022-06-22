<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>
        @stack('styles')
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}" defer></script>

    </head>
    <body class="bg-gray-300">
        <header class="p-5 border-b bg-white shadow-lg">
            <div class="container mx-auto flex justify-between items-center ">
                <a href="{{ route('home') }}" class="text-3xl font-black ">DevStagram</a>
                <nav>
                    @auth
                        <div class="flex items-center gap-2 ">
                            <a href="{{ route('posts.create') }}" class="flex items-center gap-2 bg-white border p-2 text-gray-900 rounded text-sm font-bold uppercase cursor-pointer hover:bg-black hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              Crear
                            </a>
                            <a href="{{ route('posts.index', auth()->user()->username) }}" class="font-bold mx-2 ">Hola {{auth()->user()->username}}</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="font-bold uppercase">Cerrar Sesión</button>
                            </form>
                        </div>
                    @endauth
                        
                    @guest
                        <a class="font-bold uppercase" href="{{ route('login') }}" >Login</a>
                        <a class="font-bold uppercase" href="{{ route('register') }}" >Crear Cuenta</a>   
                    @endguest
                
                    
                </nav>

            </div>
            
        </header>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="text-center p-5 font-bold text-gray-500 uppercase">
            DevStagram - Todos los derechos Reservados {{now()->year}}
        </footer>
    </body>
</html>