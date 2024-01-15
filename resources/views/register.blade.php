@extends('layouts.auth.auth')

@section('titulo')
    Register
@endsection

@section('form-auth')
    <form method="POST" action="{{ route('register') }}" class="flex flex-col" novalidate>
        @csrf
        <h1 class="self-center font-semibold text-4xl">Register</h1>

        <label class="mt-2 text-xl" for="name">Name</label>
        <input class="
                @error('name')
                    border-2 border-red-500 
                @enderror
                rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Name">
        @error('name')
            <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }} </p>
        @enderror

        <label class="mt-2 text-xl" for="username">Username</label>
        <input class="
                @error('username')
                    border-2 border-red-500 
                @enderror
                rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                value="{{ old('username') }}" type="text" id="username" name="username" placeholder="Username">
        @error('username')
            <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }} </p>
        @enderror

        <label class="mt-2 text-xl" for="email">Email</label>
        <input class="
                @error('email')
                    border-2 border-red-500 
                @enderror
                rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                value="{{ old('email') }}" type="text" id="email" name="email" placeholder="Email" >
        @error('email')
            <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }} </p>
        @enderror

        <label class="mt-2 text-xl" for="password">Password</label>
        <input class="
                @error('password')
                    border-2 border-red-500 
                @enderror
                rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                type="password" id="password" name="password" placeholder="Password">
        @error('password')
            <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }} </p>
        @enderror

        <label class="mt-2 text-xl" for="password_confirmation">Confirm your password</label>
        <input class="
                @error('password')
                    border-2 border-red-500 
                @enderror
                rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
        @error('password_confirmation')
            <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }} </p>
        @enderror

        <input class="w-full mt-4 bg-red-400 hover:bg-red-500 cursor-pointer text-center rounded-md p-2" type="submit"
            value="Register">

    </form>
@endsection
