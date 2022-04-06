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
            href="/{{ $post->author->username }}/status/{{ $post->post_code }}">
            <div style="display: flex; align-items: center;justify-content: flex-start">
                <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
                <p>{{ $post->author->name }}</p>
            </div>
            <p>{{ $post->content }}</p>
            <div>
                <small>Like 20</small>
                <small>Comment {{ count($comments->where('post_id', $post->id)) }}</small>
            </div>
            <hr>
        </a>
    @endforeach
@endsection
