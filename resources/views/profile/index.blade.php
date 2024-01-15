@extends('layouts.app')

@section('titulo')
    <p class="text-white text-center uppercase">{{ auth()->user()->username }}'s profile</p>
@endsection

@section('contenido')
    <div class="md:flex justify-center">
        <div class="md:w-1/2 border-2 border-slate-800 shadow p-6 rounded-md">
            <form action="{{ route('profile.store') }}" method="POST" class="flex flex-col" enctype="multipart/form-data">
                @csrf
                <p class="text-center font-bold bg-gradient-to-r from-purple-400 via-purple-500 text-transparent bg-clip-text py-3 text-2xl">
                    Edit your data <span class="text-white font-extralight">{{ auth()->user()->username }} <span class="font-bold bg-gradient-to-r from-purple-400 via-purple-500 text-transparent bg-clip-text py-3 text-2xl">.</span></span>
                </p>
                <label class="text-purple-400 font-bold mt-2 text-xl" for="name">Name</label>
                <input
                    class="
                        @error('name')
                            border-2 border-red-500 
                        @enderror
                        rounded p-2 mt-1 mb-3 focus:outline-none border border-slate-800 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 text-white bg-inherit"
                    value="{{ auth()->user()->name }}" type="text" id="name" name="name" placeholder="Name">
                @error('name')
                    <p class="w-full p-1 bg-purple-300 text-purple-950 font-semibold text-sm mt-1 rounded">
                        {{ $message }}
                    </p>
                @enderror
                <label class="text-purple-400 font-bold mt-2 text-xl" for="username">Username</label>
                <input
                    class="
                        @error('username')
                            border-2 border-red-500 
                        @enderror
                        rounded p-2 mt-1 mb-3 focus:outline-none border border-slate-800 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 text-white bg-inherit"
                    value="{{ auth()->user()->username }}" type="text" id="username" name="username"
                    placeholder="username">
                @error('username')
                    <p class="w-full p-1 bg-purple-300 text-purple-950 font-semibold text-sm mt-1 rounded"> {{ $message }}
                    </p>
                @enderror

                <label class="text-purple-400 font-bold mt-2 text-xl" for="image">Profile Image</label>
                <input class="rounded p-2 mt-1 mb-3 border border-slate-800 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500 text-white"
                    type="file" id="image" name="image" accept=".jpg, .jpeg, .png">

                <div class="flex flex-col border-t border-opacity-50 border-purple-100 pt-2 mt-2">
                    <p class="text-stone-300 text-xs text-center font-extralight">If you want to change your password, enter your current password before</p>
                    <label class="text-purple-400 font-bold mt-2 text-xl" for="current_password">Current Password</label>
                    <input
                        class="
                            @error('current_password')
                                border-2 border-red-500 
                            @enderror
                            rounded p-2 mt-1 mb-3 focus:outline-none border border-slate-800 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 text-white bg-inherit"
                        type="password" id="current_password" name="current_password"
                        placeholder="Current password">
                    @if (session('message-credentials'))
                        <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-3 rounded"> {{ session('message-credentials') }} </p>
                    @endif

                    <label class="text-purple-400 font-bold mt-2 text-xl" for="new_password">New Password</label>
                    <input
                        class="
                            @error('new_password')
                                border-2 border-red-500 
                            @enderror
                            rounded p-2 mt-1 mb-3 focus:outline-none border border-slate-800 focus:border-purple-500 focus:ring-2 focus:ring-purple-500 text-white bg-inherit"
                        type="password" id="new_password" name="new_password"
                        placeholder="New password">
                    @error('new_password')
                        <p class="w-full p-1 bg-purple-300 text-purple-950 font-semibold text-sm mt-1 rounded"> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <p class="text-white font-extralight">You can always edit this data again!</p>
                    <input
                        class="uppercase text-xs w-1/3 mt-4 self-end bg-purple-500 cursor-pointer text-center rounded-md py-4 text-white font-bold"
                        type="submit" value="Save changes">
                </div>

            </form>
        </div>
    </div>
@endsection
