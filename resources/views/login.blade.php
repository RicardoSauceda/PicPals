@extends('layouts.auth.auth')

@section('titulo')
    Login
@endsection

@section('form-auth')
    <form action="{{ route('login') }}" method="POST" class="flex flex-col">
        @csrf
        <h1 class="self-center font-semibold text-4xl">Login</h1>

        @if (session('message-credentials'))
            <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-3 rounded"> {{ session('message-credentials') }} </p>
        @endif

        <label for="email">Email</label>
        <input class="
                @error('email')
                    border-2 border-red-500 
                @enderror
                rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                value="{{ old('email') }}" type="text" id="email" name="email" placeholder="Email">
            @error('email')
                <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }} </p>
            @enderror
        <label for="password" class="mt-4">Password</label>
        <input class="
                @error('password')
                    border-2 border-red-500 
                @enderror
                    rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                type="password" id="password" name="password" placeholder="Password">
                @error('password')
                    <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }} </p>
                @enderror
        <div class="flex text-center mt-1 py-1 gap-1">
            <input type="checkbox" name="remember" id="remember">
            <label class="font-semibold text-sm" for="remember">Keep you logged in</label>
        </div>
        <input class="w-full mt-4 bg-red-400 hover:bg-red-500 cursor-pointer text-center rounded-md p-2" type="submit"
            value="Login">
    </form>
@endsection
