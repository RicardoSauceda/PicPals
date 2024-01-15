@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
    @if ($posts->count())
        {{-- <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}" class="">
                        <img src="{{ asset('uploads/' . $post->image) }}" alt="Imagen del post {{ $post->title }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-1">
            {{ $posts->links() }}
        </div> --}}
        <x-list-posts :posts="$posts" />
    @else
        <div class="flex justify-center">
            <p class="text-center rounded-xl bg-slate-500 p-1 text-slate-200">There are no posts to show you yet 🥸</p>
        </div>
    @endif
@endsection
