<div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
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
    </div>
</div>
