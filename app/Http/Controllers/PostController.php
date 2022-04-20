<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class PostController extends Controller
{
    public function all(User $author)
    {
        return view('user.profile', [
            'title' => 'Post by ' . $author->name,
            'author' => $author,
            'posts' => $author->posts()->where('post_category_id', 1)->latest()->get(),
            'media' => $author->media()->latest()->get(),
            'follower' => $author->follower()->latest()->get(),
            'following' => $author->following()->latest()->get(),
            'notifs' => Notification::where('to_user_id', auth()->user()->id)->latest()->get(),
        ]);
    }
    public function show(User $author, Post $posts)
    {
        return view('user.post', [
            'title' => 'Post by @' . $author->username,
            'post' => $posts,
            'author' => $author,
            // 'comments' => $posts->comments()->latest()->get(),
            // 'likes' => $posts->likes()->get(),
            'notifs' => Notification::where('to_user_id', auth()->user()->id)->latest(),
        ]);
    }

    public function allFess()
    {
        return view('user.home', [
            'title' => "MenFess",
            'posts' => Post::latest()->get(),
            'notifs' => Notification::where('to_user_id', auth()->user()->id)->latest()->get(),
        ]);
    }

    public function showFess(User $author, Post $posts)
    {
        return view('user.post', [
            'title' => 'Discussion',
            'posts' => Post::latest()->get(),
            'post' => $posts,
            'author' => $author,
            // 'comments' => Comment::where('commentable_id', $posts->id)->latest()->get(),
            // 'likes' => Like::where('post_id', $posts->id)->get(),
            'notifs' => Notification::where('to_user_id', auth()->user()->id)->latest()->get(),
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
        // $validatedData['content'] = $request['post-trixFields']['content'];
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
            'user_id' => 'required',
            'notif_trigger_user_id' => 'required'
        ]);
        $data = Like::where('post_id', $validatedData['post_id'])->where('user_id', $validatedData['user_id']);
        if ($data->exists()) {
            $data->delete();
            return redirect()->back()->with('error', 'You already liked this post');
        } else {
            $like = new Like;
            $like->post_id = $validatedData['post_id'];
            $like->author()->associate(auth()->user());
            $like->save();
            Notification::preventTwice('like', auth()->user(), $validatedData['notif_trigger_user_id'], $validatedData['post_id'], $request->is_menfess);
            return redirect()->back()->with('success', 'You liked this post');
        }
    }

    public function comment(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'content' => 'required',
            'notif_trigger_user_id' => 'required'
        ]);

        $comment = new Comment;
        $comment->content = $validatedData['content'];
        $comment->author()->associate(auth()->user());

        $post = Post::find($validatedData['post_id']);
        $post->comments()->save($comment);

        Notification::preventTwice('comment', auth()->user(), $validatedData['notif_trigger_user_id'], $validatedData['post_id'], $request->is_menfess);
        return redirect()->back()->with('success', 'Comment created successfully');
    }

    public function reply(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required',
            'reply' => 'required',
            'parent_id' => 'required',
            'notif_trigger_user_id' => 'required'
        ]);

        $comment = new Comment;
        $comment->content = $validatedData['reply'];
        $comment->author()->associate(auth()->user());
        $comment->parent_id = $validatedData['parent_id'];

        $post = Post::find($validatedData['post_id']);
        $post->comments()->save($comment);

        Notification::preventTwice('reply', auth()->user(), $validatedData['notif_trigger_user_id'], $validatedData['post_id'], $request->is_menfess);
        return redirect()->back()->with('success', 'Reply created successfully');
    }

    public function unshow_notif(Request $request)
    {
        $notif = Notification::find($request->notif_id);
        $notif->show = false;
        $notif->save();
        return redirect()->back();
    }

    public function follow(Request $request)
    {
        return $request;
    }
    public function unfollow(Request $request)
    {
        return $request;
    }
}
