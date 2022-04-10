@extends('layouts.main')

@section('content')
    <div>
        <div style="display: flex; align-items: center">
            <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
            <p>{{ Request::is('menfess') ? auth()->user()->disguise(auth()->user()->username) : auth()->user()->username }}</p>
        </div>
        <form action="/create" method="POST">
            @csrf
            @method('POST')
            @if (Request::is('menfess'))
                <input type="text" name="subject" placeholder="Subject">
            @endif
            <input type="hidden" name="is_menfess" value="{{ Request::is('menfess*') ? true : false }}">
            <input type="text" placeholder="Apa yang kamu pikirkan"
                style="padding: 10px; display:block; width:100%; margin-top:10px" name="content">
            <input type="hidden" name="post_category_id" value="{{ Request::is('menfess') ? 2 : 1 }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" style="margin-top: 10px; padding: 10px">Post</button>
        </form>
        <hr>
        <br><br>
    </div>
    @foreach ($posts as $post)
        <a style="margin: auto; display:block; color:black; text-decoration: none"
            href="/{{ Request::is('menfess')? 'menfess/' . $post->post_code: $post->author->username . '/status/' . $post->post_code }}">
            <div style="display: flex; align-items: center;justify-content: flex-start">
                <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
                <p style="font-weight: bold">
                    {{ Request::is('menfess*') ? $post->subject : $post->author->name }}</p>
            </div>
            <p>{{ $post->content }}</p>
            <div>
                <small style="font-weight:  {{ $post->isLike(auth()->user()->id, $post->id) ? 'bold' : 'inherit' }}">Like
                    {{ $post->likes->count() }}</small>
                <small>Comment {{ $post->comments->count() }}</small>
                @if (Request::is('menfess'))
                    <small>By {{ $post->author->disguise($post->author->name) }}</small>
                @endif
            </div>
            <br>
            <div style="width: 100%; height: 1px; background-color: lightgray"></div>
            <br>
        </a>
    @endforeach
@endsection

@section('notifications')
    @include('notifications')
@endsection
