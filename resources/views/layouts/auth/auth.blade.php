<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>PicPals - @yield('titulo')</title>
</head>

<body class="bg-gray-950">
    <header class="p-5 border-b border-gray-700 bg-gray-900">
        <div class="container mx-auto flex justify-between items-center">
            <a href="
            @auth
                {{ route('posts.index', auth()->user()->username) }}
            @endauth
            @guest
                {{ route('/') }}
            @endguest
            "
            class="text-2xl font-semibold text-white">PicPals</a>
            <nav class="flex gap-4 items-center">
                <a class="text-white" href="{{ route('login') }}">Login</a>
                <a class="text-white" href="{{ route('register') }}">Sign Up</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <h1 class="text-white text-center">@yield('titulo')</h1>
        <div class="md:flex md:justify-center w-full md:h-[42rem] mt-10">
            <div class="bg-gray-900 md:w-1/2 text-white rounded-l-lg flex flex-col items-center justify-center">
                <img src="{{ asset('img/devs - icon.png') }}" alt="Logo Devs" class="md:w-96 w-80 p-4">
                <h1 class="mt-4 text-2xl font-semibold ">PicPals</h1>
            </div>
            <div class="md:flex md:flex-col p-8 bg-gray-700 md:w-4/12 w-full text-white rounded-r-lg justify-center">
                @yield('form-auth')
            </div>
        </div>
    </main>

    <footer class="text-white text-center p-5 font-semibold mt-10">
        @yield('footer')
        {{-- DevStagram - @php $date = getdate(); @endphp {{ $date['year'] }} --}}
        PicPals - {{ now()->year }}
    </footer>
</body>

</html>
