@extends('layouts.main')

@section('content')
    <div class="rounded-2xl overflow-hidden">
        @include('partials.profile')
    </div>
    <div class="">
        @switch(Request::get('data'))
            @case('media')
                <h2>Ini Media</h2>
            @break

            @case('follower')
                <h2>Ini Follower</h2>
            @break

            @case('following')
                <h3>Ini Following</h3>
            @break

            @default
                @foreach ($posts->where('post_category_id', 1) as $post)
                    @include('partials.fragment-post', ['post' => $post])
                @endforeach
        @endswitch
    </div>
@endsection

@section('notifications')
    @include('notifications')
@endsection

@section('sidebar-row-1')
@endsection

@section('sidebar-row-2')
    @include('partials.update-post', [
        'posts' => $posts->where('post_category_id', 1)->take(4),
    ])
    <div class="mb-2"></div>
    @include('partials.update-fess', [
        'posts' => $posts->where('post_category_id', 2)->take(4),
    ])
@endsection
