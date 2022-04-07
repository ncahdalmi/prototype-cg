@extends('layouts.main')

@section('content')
    <div>
        <div style="display: flex; align-items: center">
            <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
            <p>Samsuldin</p>
        </div>
        <input type="text" placeholder="Apa yang kamu pikirkan"
            style="padding: 10px; display:block; width:100%; margin-top:10px">
        <hr>
        <br><br>
    </div>
    @foreach ($posts as $post)
        <a style="margin: auto; display:block; color:black; text-decoration: none"
            href="/{{ Request::is('menfess') ? 'menfess/'. $post->post_code : $post->author->username .'/status/' . $post->post_code }}">
            <div style="display: flex; align-items: center;justify-content: flex-start">
                <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
                <p>{{ Request::is('menfess') ? $post->author->disguise($post->author->name) : $post->author->name }}</p>
            </div>
            <p>{{ $post->content }}</p>
            <div>
                <small>Like {{ count($likes->where('post_id', $post->id)) }}</small>
                <small>Comment {{ count($comments->where('post_id', $post->id)) }}</small>
            </div>
            <br>
            <div style="width: 100%; height: 1px; background-color: lightgray"></div>
            <br>
        </a>
    @endforeach
@endsection
