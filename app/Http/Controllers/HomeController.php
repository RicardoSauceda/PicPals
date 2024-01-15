<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        if (!auth()->check()) {
            return view('principal');
        } else {
            $ids = (auth()->user()->followings->pluck('id')->toArray());
            // $posts = Post::whereIn('user_id', $ids)->orderBy('created_at', 'desc')->paginate(20);
            $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);
            return view('home', [
                'posts' => $posts
            ]);
        }
    }
}
