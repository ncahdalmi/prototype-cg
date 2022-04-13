@extends('layouts.main')

@section('content')
  <div>
    @include('partials.posting')
  </div>
  @foreach ($posts as $post)
    <a
      href="/{{ Request::is('menfess')? 'menfess/' . $post->post_code: $post->author->username . '/status/' . $post->post_code }}">
      <div>
        <div>Profile</div>
        <p>
          {{ Request::is('menfess*') ? $post->subject : $post->author->name }}</p>
      </div>
      <p>{{ $post->content }}</p>
      <div>
        <small>Like
          {{ $post->likes->count() }}</small>
        <small>Comment {{ $post->comments->count() }}</small>
        @if (Request::is('menfess'))
          <small>By {{ $post->author->disguise($post->author->name) }}</small>
        @endif
      </div>
    </a>
  @endforeach
@endsection

@section('notifications')
  @include('notifications')
@endsection

@section('profile')
  @include('partials.profile')
@endsection

@section('updates')
  @include('partials.updates')
@endsection
