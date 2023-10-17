<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title> JC-Diagrammer @yield('titulo')</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                JC-Diagrammer
            </h1>
            @auth
                <nav class="flex gap-4 items-center">
                    <a class="font-bold uppercase text-gray-600" href="#">
                        Hola:<samp class="font-normal">{{ auth()->user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600">Cerrar sesión</button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-4 items-center">
                    <a class="font-bold uppercase text-gray-600" href="#">Ingresar</a>
                    <a class="font-bold uppercase text-gray-600" href="/registrarse">Registrarse</a>
                </nav>
            @endguest
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            PAGINA PARA INICIAR LA SESION DE LA REUNION
        </h2>
    </main>
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuario" />
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl">{{ auth()->user()->name }}</p>
                <button class="bg-blue-200 text-blue-800 font-bold px-4 py-2 rounded-full mt-4">
                    <a href="{{ route('pizarra') }}" class="text-blue-800 text-decoration-none">Iniciar reunion</a>
                </button>
                <div class="mt-4">
                    <input type="text" class="w-full p-2 border border-gray-300 rounded-full" placeholder="Ingresar código">
                    <button class="bg-blue-200 text-blue-800 font-bold px-4 py-2 rounded-full mt-2">
                        <a href="{{ route('pizarra') }}" class="text-blue-800 text-decoration-none">Ingresar</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center p-5 text-gray-500 font-bold uppercase">
        JC-Diagrammer - Todos los derechos reservados @php
            echo date('Y');
        @endphp
    </footer>
</body>

</html>
