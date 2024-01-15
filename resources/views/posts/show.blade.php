@extends('layouts.app')

@section('titulo')
{{ $post->title }}
@endsection

@section('contenido')

@if (session('message'))
<div id="comment-success" class="bg-green-500 text-white font-semibold text-center rounded-lg p-1 m-3">
    {{ session('message') }}</div>
@endif

<div class="container mx-auto md:flex">
    <div class="lg:w-1/2 p-5 text-white">
        <img class="rounded-lg" src="{{ asset('uploads/' . $post->image) }}" alt="Imagen del post {{ $post->image }}">
        <div class="inline-flex mt-2 px-3 gap-1">
            @auth
                @livewire('like-post', ['post' => $post])
            @endauth
        </div>
        <div class="px-3 font-bold">
            <p> {{ $post->user->username }}: {{ $post->description }} </p>
        </div>
        <div class="px-3 font-bold text-slate-200 text-sm"> {{ $post->created_at->diffForHumans() }} </div>
        @auth
        @if ($post->user_id === auth()->user()->id)
        <form method="POST" class="p-2" action="{{ route('posts.destroy', $post) }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="flex gap-1 items-center bg-red-500 hover:bg-red-600 p-2 font-bold rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                Delete
            </button>
        </form>
        @endif

        @endauth
    </div>
    <div class="lg:w-1/2">
        <form action="{{ route('comment.store', ['post' => $post, 'user' => $user]) }}" method="POST">
            @csrf
            <div class="bg-gray-800 flex flex-col py-2 px-4 rounded-r h-full">
                <h1 class="text-white text-center m-1 font-semibold text-xl">Comments</h1>
                @auth
                <label class="mt-2 text-lg text-white p-1 font-semibold" for="comment">Comment</label>
                <textarea rows="5"
                    class="
                                @error('comment')
                                    border-2 border-red-500 
                                @enderror
                                rounded p-2 mt-1 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500 text-black"
                    type="text" id="comment" name="comment" placeholder="What are you think?"></textarea>
                @error('comment')
                <p class="w-full p-1 bg-amber-300 text-amber-950 font-semibold text-sm mt-1 rounded">
                    {{ $message }}
                </p>
                @enderror
                <input
                    class="w-full mt-4 bg-blue-600 hover:bg-blue-700 cursor-pointer text-center rounded-md p-2 text-white uppercase font-semibold"
                    type="submit" value="Add Comment">
                @endauth

                <div class="shadow mb-5 h-[34rem] overflow-y-scroll">
                    @if ($post->comments->count())
                    @foreach ($post->comments as $comment)
                    <div class="p-5 border-cyan-950 border-b">
                        <a href="{{ route('posts.index', $comment->user) }}" class="text-white font-semibold">
                            {{ $comment->user->username }} </a>
                        <p class="text-white font-light"> {{ $comment->comment }} </p>
                        <p class="text-stone-400 font-light text-sm">
                            {{ $comment->created_at->diffForHumans() }} </p>
                    </div>
                    @endforeach
                    @else
                    <p class="p-10 text-center text-stone-200 font-semibold"> No comments yet </p>
                    @endif
                </div>

            </div>
        </form>
    </div>
</div>
@endsection