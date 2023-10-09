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
            Registrate en JC-Diagrammer
        </h2>

    </main>
    <div class="md:flex md:justify-center md:gap-10 md:items-center"> <!-- Inicio de un contenedor flex -->
        <div class="md:w-6/12 p-5 shadow-md shadow-opacity-100">
            <img src="{{ asset('img/13.jpg') }}" alt="Imagen de registro">
        </div>
        <div class="md:w-4/12  bg-white p-6 rounded-2xl shadow-2xl">
            <form action="/registrarse" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-2xl @error('name')
                            border-red-500 
                        @enderror "
                        value={{ old('name') }}>
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-2xl text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                    <!-- Agrega un "for" para asociar la etiqueta con un campo de entrada -->
                </div>
                <div class="mb-5">
                    <label for="lastname" class="mb-2 block uppercase text-gray-500 font-bold">Apellido

                    </label>
                    <input id="lastname" name="lastname" type="text" placeholder="Tu Apellido"
                        class="border p-3 w-full rounded-2xl  @error('lastname')
                        border-red-500 
                    @enderror "
                        value={{ old('lastname') }}>
                    @error('lastname')
                        <p class="bg-red-500 text-white my-2 rounded-2xl text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                    <!-- Agrega un "for" para asociar la etiqueta con un campo de entrada -->
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo

                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu Correo Electronico"
                        class="border p-3 w-full rounded-2xl  @error('email')
                        border-red-500 
                    @enderror " />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-2xl text-sm p-2 text-center">{{ $message }}</p>
                    @enderror


                    <!-- Agrega un "for" para asociar la etiqueta con un campo de entrada -->
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña

                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu Contraseña de Registro"
                        class="border p-3 w-full rounded-2xl  @error('password')
                        border-red-500 
                    @enderror " />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-2xl text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                    <!-- Agrega un "for" para asociar la etiqueta con un campo de entrada -->
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar
                        Contraseña

                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Confirmar Tu Contraseña de Registro"
                        class="border p-3 w-full rounded-2xl @error('password_confirmation')
                        border-red-500 
                    @enderror " />

                    <!-- Agrega un "for" para asociar la etiqueta con un campo de entrada -->
                </div>
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-2xl text-sm p-2 text-center">{{ $message }}</p>
                @enderror
                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-2xl" />
            </form>
        </div>
    </div> <!-- Cierre del contenedor flex -->

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        JC-Diagrammer - Todos los derechos reservados
        <?php echo date('Y'); ?>
    </footer>
</body>

</html>
