@extends('layouts.app')

@section('titulo')
    {{-- {{ $user->username }} Account --}}
@endsection

@section('contenido')
    <div class="flex justify-center mt-4">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row    text-whitep-5 items-center">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img class="rounded-full"
                    src="{{ $user->image ? asset('profile_pictures/' . $user->image) : asset('img/usuario.svg') }}"
                    alt="{{ $user->username }} - Profile Picture">
            </div>

            <div class="md:w-1/8 lg:w-6/12 py-4 px-6 flex flex-col items-center md:justify-center md:items-start">
                <p class="font-semibold text-lg text-white"> {{ $user->username }} </p>
                <p class="text-gray-300 text-sm mb-2 font-bold mt-1">
                    {{ $user->followers->count() }} <span class="font-thin"> @choice('Follower|Followers', $user->followers->count()) </span>
                </p>

                <p class="text-gray-300 text-sm mb-2 font-bold">
                    {{ $user->followings->count() }} <span class="font-thin"> Following </span>
                </p>

                <p class="text-gray-300 text-sm mb-2 font-bold">
                    {{ $user->posts->count() }} <span class="font-thin">Posts</span>
                </p>
                @auth
                    @if ($user->id != auth()->user()->id)
                        @if ($user->checkFollowing(auth()->user()))
                            <form action="{{ route('unfollow.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="py-2">
                                    <button type="submit"
                                        class="flex gap-2 text-center items-center text-white rounded-md bg-red-700 hover:bg-red-800 px-2 py-1 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                        </svg>
                                        Unfollow
                                    </button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('follow.store', $user) }}" method="POST">
                                @csrf
                                <div class="py-2">
                                    <button type="submit"
                                        class="flex gap-2 text-center items-center text-white rounded-md bg-sky-700 hover:bg-sky-800 px-2 py-1 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                            <path
                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path
                                                d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                        </svg>
                                        Follow
                                    </button>
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="py-2">
                            <a type="submit" href="{{ route('profile.index') }}"
                                class="flex gap-2 cursor-pointer text-center items-center text-white rounded-md hover:bg-white bg-black hover:text-black border px-2 py-1 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                Edit Profile
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-xl text-center font-black my-10 text-white">Posts</h2>
        @if (count($posts))
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
            <div class="flex w-full items-center justify-center">
                <p
                    class="bg-slate-800 text-gray-300 text-center text-xl font-semibold my-10 rounded-lg p-2 w-fit items-center">
                    No publications yet 😕 </p>
            </div>
        @endif
    </section>
@endsection
