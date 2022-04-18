@extends('layouts.main')

@section('content')
   <div>
      <div style="display: flex; align-items: center;justify-content: flex-start">
         <div style="width:50px; height: 50px; background-color: red; margin-right: 10px"></div>
         <p style="font-weight: bold">
            {{ Request::is('menfess*') ? $post->author->disguise($post->author->name) : $post->author->name }}</p>
      </div>
      <p>{{ $post->content }}</p>
      <div>
         <small>
            <form action="/like" method="post">
               @csrf
               @method('POST')
               <input type="hidden" name="is_menfess" value="{{ Request::is('menfess*') ? true : false }}">
               <input type="hidden" name="post_id" value="{{ $post->id }}">
               <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
               <input type="hidden" name="notif_trigger_user_id" value="{{ $post->author->id }}">
               <button class="z-10">
                  <x:feather-heart
                     class="w-6 {{ $post->isLike(auth()->user()->id, $post->id) ? 'bg-pink-600' : 'bg-secondary' }} rounded-full p-[2.5px]" />
               </button>
               <span
                  class="bg-white text-primary -ml-2 rounded-r-full min-w-[2rem] text-right px-2">{{ $post->likes->count() >= 1000 ? $post->likes->count() / 1000 . 'k' : $post->likes->count() }}</span>
            </form>
         </small>
         <small>Comment {{ $post->comments->count() }}</small>
      </div>
      <br>
      <div style="width: 100%; height: 1px; background-color: lightgray"></div>
      <br>
      <div>
         <form action="/comment" method="post">
            @csrf
            @method('POST')
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="is_menfess" value="{{ Request::is('menfess*') ? true : false }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="notif_trigger_user_id" value="{{ $post->author->id }}">
            <input style="display: block; width:100%; padding: 5px" type="text" name="content" placeholder="Comment"
               value="{{ old('content') }}">
            <button type="submit">Comment</button>
         </form>
      </div>
      <br>
      <div style="width: 100%; height: 1px; background-color: lightgray"></div>
      <br>
      <div id="comment-section">
         @foreach ($post->comments as $comment)
            <div style="background-color: grey; margin-bottom: 5px; padding: 10px; border-bottom: 1px solid lightgray">
               <div style="display: flex; align-items: center;justify-content: flex-start">
                  <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
                  <p style="font-weight: bold">
                     {{ Request::is('menfess*') ? $comment->author->disguise($comment->author->name) : $comment->author->name }}
                  </p>
               </div>
               <p>{{ $comment->content }}</p>
               @include('partials.replies', ['comment' => $comment, 'post_id' => $post->id])'
               @include('partials.reply', [
                   'replies' => $comment->replies,
                   'comment' => $comment,
                   'post_id' => $post->id,
               ])
            </div>
         @endforeach
      </div>
   </div>
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
