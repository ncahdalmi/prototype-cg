<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class PostController extends Controller
{
    public function all(User $author)
    {
        $posts = Post::where('user_id', $author->id)->get();
        return view('home', [
            'title' => 'Post by ' . $author->name,
            'posts' => $posts,
            'comments' => Comment::all(),
        ]);
    }
    public function show(User $author, Post $posts)
    {
        return view('post', [
            'title' => $posts->title,
            'post' => $posts,
            'author' => $author,
            'comments' => Comment::where('post_id', $posts->id)->get(),
        ]);
    }
}
