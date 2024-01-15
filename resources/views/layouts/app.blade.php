<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PicPals</title>
    @stack('styles')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body class="bg-gray-950">
    <header class="p-5 border-b border-gray-700 bg-gray-900">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('/') }}" class="text-2xl font-semibold text-white">PicPals</a>
            <nav class="flex gap-4 items-center">
                @if (!auth()->user())
                    <a class="text-white border p-2 rounded-md hover:bg-white hover:text-black hover:scale-110 ease-in duration-150" href="{{ route('login') }}">Login</a>
                    <a class="text-white border p-2 rounded-md hover:bg-white hover:text-black hover:scale-110 ease-in duration-150" href="{{ route('register') }}">Sign Up</a>
                @else
                    <a href="{{ route('posts.create') }}"
                        class="flex gap-2 items-center text-white font-semibold border p-2 rounded-md hover:bg-white hover:text-black cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        New Post
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex text-white gap-2 hover:text-black hover:bg-white p-2 rounded-md cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            Logout
                        </button>
                    </form>
                    <a class="flex text-white gap-2 hover:bg-white hover:text-black p-2 rounded-md"
                        href="{{ route('posts.index', auth()->user()->username) }}"
                        class="text-white mr-2 p-2 font-semibold hover:border rounded roudend-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ auth()->user()->username }} </span>
                    </a>
                @endif
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <h1 class="text-white text-center mb-5">@yield('titulo')</h1>
        @yield('contenido')
    </main>

    <footer class="text-white text-center p-5 font-semibold">
        @yield('footer')
        {{-- DevStagram - @php $date = getdate(); @endphp {{ $date['year'] }} --}}
        PicPals - {{ now()->year }}
    </footer>
    @livewireScripts
</body>

</html>
