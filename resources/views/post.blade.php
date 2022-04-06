@extends('layouts.main')

@section('content')
    <div style="margin: auto; display:block; color:black; text-decoration: none"
        href="/{{ $post->author->username }}/status/{{ $post->post_code }}">
        <div style="display: flex; align-items: center;justify-content: flex-start">
            <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
            <p>{{ $post->author->name }}</p>
        </div>
        <p>{{ $post->content }}</p>
        <div>
            <small>Like 20</small>
            <small>Comment {{ count($comments) }}</small>
        </div>
        <hr>
        <div id="comment-section">
            @foreach ($comments as $comment)
                <div style="background-color: grey; margin-bottom: 5px; padding: 10px">
                    <div style="display: flex; align-items: center;justify-content: flex-start">
                        <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
                        <p>{{ $comment->author->name }}</p>
                    </div>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
