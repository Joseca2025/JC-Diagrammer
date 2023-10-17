<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title> JC-Diagrammer @yield('titulo')</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="go-debug.js"></script>
    <!-- Agrega estos scripts para socket.io -->
    <link rel="stylesheet" href="{{ asset('pizarra.css') }}">
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
                        Hola: <samp class="font-normal">{{ auth()->user()->name }}</samp>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600">Cerrar sesión</button>
                    </form>
                </nav>
            @endauth
        </div>
    </header>

    <div class="contenedor">
        <div class="pizarra">
            <!-- Contenido de la pizarra -->
            <canvas id="whiteboard"></canvas>
        </div>
        <div class="rectangulo">
            <!-- Contenido de la pizarra -->
        </div>
    </div>

    <script src="{{ asset('pizarra.js') }}">
        socket.on("chat message", (msg) => {
            // Manejar el mensaje en el cliente
            console.log(`Nuevo mensaje: ${msg}`);
        });
    </script>
    <script src="{{ asset('formas.js') }}" >
    </script> 

</body>

</html>
