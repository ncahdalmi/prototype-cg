<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function all(User $author)
    {
        return view('home', [
            'title' => 'Post by ' . $author->name,
            'posts' => $author->posts()->where('post_category_id', 1)->latest()->get(),
        ]);
    }
    public function show(User $author, Post $posts)
    {
        return view('post', [
            'title' => 'Post by @' . $author->username,
            'post' => $posts,
            'author' => $author,
            // 'comments' => Comment::where('post_id', $posts->id)->latest()->get(),
            'comments' => $posts->comments()->latest()->get(),
            // 'likes' => Like::where('post_id', $posts->id)->get()
            'likes' => $posts->likes()->get()
        ]);
    }

    public function allFess()
    {
        return view('home', [
            'title' => "MenFess",
            'posts' => Post::where('post_category_id', 2)->latest()->get(),
            'comments' => Comment::all(),
            'likes' => Like::all()
        ]);
    }

    public function showFess(User $author, Post $posts)
    {
        return view('post', [
            'title' => 'Discussion',
            'post' => $posts,
            'author' => $author,
            'comments' => Comment::where('post_id', $posts->id)->latest()->get(),
            'likes' => Like::where('post_id', $posts->id)->get()
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'post_category_id' => 'required',
            'user_id' => 'required',
            'content' => 'required',
            'subject' => 'max:255|min:6'
        ]);

        $validatedData['post_code'] = Str::random(10);
        Post::create($validatedData);
        if ($validatedData['post_category_id'] == 1) {
            return redirect()->route('home')->with('success', 'Post created successfully');
        } else {
            return redirect()->route('menfess')->with('success', 'Post created successfully');
        }
    }

    public function destroy(Request $request)
    {
        return $request;
    }

    public function like(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required',
            'user_id' => 'required'
        ]);
        $data = Like::where('post_id', $validatedData['post_id'])->where('user_id', $validatedData['user_id']);
        if ($data->exists()) {
            $data->delete();
            return redirect()->back()->with('error', 'You already liked this post');
        } else {
            Like::create($validatedData);
            return redirect()->back()->with('success', 'You liked this post');
        }
    }

    public function comment(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'content' => 'required'
        ]);
        Comment::create($validatedData);
        return redirect()->back()->with('success', 'Comment created successfully');
    }
}
