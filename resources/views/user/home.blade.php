@extends('layouts.main')
@section('content')
    <div class="rounded-2xl overflow-hidden">
        @include('partials.posting')
    </div>
    <div class="">
        @if (Route::is('menfess*'))
            @foreach ($posts->where('post_category_id', 2) as $post)
                @include('partials.fragment-post', ['post' => $post])
            @endforeach
        @else
            @foreach ($posts->where('post_category_id', 1) as $post)
                @include('partials.fragment-post', ['post' => $post])
            @endforeach
        @endif
    </div>
@endsection

@section('notifications')
    @include('notifications')
@endsection


@section('sidebar-row-1')
    @includeWhen(!Route::is('menfess'), 'partials.profile', ['author' => auth()->user()])
@endsection

@section('sidebar-row-2')
    @if (Route::is('menfess*'))
        @include('partials.update-post', [
            'posts' => $posts->where('post_category_id', 1)->take(4),
        ])
    @else
        @include('partials.update-fess', [
            'posts' => $posts->where('post_category_id', 2)->take(4),
        ])
    @endif
@endsection
