<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function all(User $author)
    {
        $posts = Post::where('user_id', $author->id)->get();
        return view('home', [
            'title' => 'Post by ' . $author->name,
            'posts' => $posts,
            'comments' => Comment::all(),
            'likes' => Like::all()
        ]);
    }
    public function show(User $author, Post $posts)
    {
        return view('post', [
            'title' => 'Post by @' . $author->username,
            'post' => $posts,
            'author' => $author,
            'comments' => Comment::where('post_id', $posts->id)->get(),
            'likes' => Like::where('post_id', $posts->id)->get()
        ]);
    }

    public function allFess(){
        return view('home', [
            'title' => "MenFess",
            'posts' => Post::where('post_category_id', 2)->get(),
            'comments' => Comment::all(),
            'likes' => Like::all()
        ]);
    }

    public function showFess(User $author, Post $posts){
        return view('post', [
            'title' => 'Discussion',
            'post' => $posts,
            'author' => $author,
            'comments' => Comment::where('post_id', $posts->id)->get(),
            'likes' => Like::where('post_id', $posts->id)->get()
        ]);
    }
}
