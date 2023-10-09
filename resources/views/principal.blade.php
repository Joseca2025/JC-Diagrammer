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
                    <a class="font-bold uppercase text-gray-600" href="/login">Ingresar</a>
                    <a class="font-bold uppercase text-gray-600" href="/registrarse">Registrarse</a>
                </nav>
            @endguest


        </div>
    </header>

    <main class="container mx-auto mt-10">

        <h2 class="font-black text-center text-3xl mb-10">
            PAGINA PRINCIPAL
        </h2>

    </main>

    <footer class="text-center p-5 text-gray-500 font-bold uppercase">
        JC-Diagrammer -Todos los derechos reservados @php
            echo date('Y');
        @endphp
    </footer>

</body>

</html>
