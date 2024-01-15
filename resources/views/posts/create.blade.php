@extends('layouts.app')

@section('titulo')
    Create a New Post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded-xl flex flex-col justify-center items-center font-semibold text-gray-400">
                @csrf
            </form>
        </div>
        <div class="bg-gray-900 md:w-1/2 text-white rounded-l-lg flex flex-col p-5 mt-10 md:mt-0">
            <form method="POST" action="{{ route('posts.store') }}" class="flex flex-col" novalidate>
                @csrf
                <h1 class="self-center font-semibold text-2xl">What are you post?</h1>

                <label class="mt-2 text-lg font-semibold" for="name">Title</label>
                <input
                    class="
                    @error('title')
                        border-2 border-red-500
                    @enderror
                    rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                    value="{{ old('title') }}" type="text" id="title" name="title"
                    placeholder="Add a title for your post">
                @error('title')
                    <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded"> {{ $message }}
                    </p>
                @enderror
                <label class="mt-2 text-lg font-semibold" for="name">Descrption</label>
                <textarea rows="5"
                    class="
                    @error('description')
                        border-2 border-red-500 
                    @enderror
                    rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                    type="text" id="description" name="description" placeholder="What are you think?">{{ old('description') }}</textarea>
                @error('description')
                    <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <input hidden name="image" value="{{ old('image') }}">
                    @error('image')
                        <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input class="w-full mt-4 bg-blue-600 hover:bg-blue-700 cursor-pointer text-center rounded-md p-2"
                    type="submit" value="Post">
            </form>
        </div>
    </div>
@endsection
