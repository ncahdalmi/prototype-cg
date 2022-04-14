@extends('layouts.main')

@section('content')
   <div>
      <div>{{ session('success') }}</div>
      <div>
         <div class="relative bg-secondary m-2 p-2 pb-8 block rounded-2xl">
            <div class="abosolute flex items-center p-4 z-10">
               <img src="{{ asset('img/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}"
                  class="w-10 block rounded-full mr-4 shadow-sm">
               <div>
                  <p class="flex items-start">
                     <span class="mr-2">
                        {{ Request::is('menfess')? auth()->user()->disguise(auth()->user()->username): auth()->user()->name }}
                     </span>
                     <a href="/{{ $post->author->username }}/status" class="text-secondary-grey text-xs">
                        <span>@</span>{{ auth()->user()->username }}
                     </a>
                  </p>
                  <p class="text-xs text-secondary-grey">{{ $post->created_at->diffForhumans() }}</p>
               </div>
            </div>
            <div>
               <div class="ml-[4.5rem] text-justify mr-10">
                  <div class="mb-2 text-xs font-inter">
                     <p>
                        {{ Request::is('menfess*') ? $post->subject : null }}
                     </p>
                     <p class="">
                        {!! $post->content !!}
                     </p>
                  </div>
                  <div class="mt-4 flex justify-end">
                     <small class="mr-4">
                        <form action="/like" method="post" class="flex items-center">
                           @csrf
                           @method('POST')
                           <input type="hidden" name="is_menfess" value="{{ Request::is('menfess*') ? true : false }}">
                           <input type="hidden" name="post_id" value="{{ $post->id }}">
                           <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                           <input type="hidden" name="notif_trigger_user_id" value="{{ $post->author->id }}">
                           {{-- <button class="bg-secondary-grey py-1 px-2 rounded-full flex">
                              <x:feather-heart class="block w-4 mr-1" /> <span>Like</span>
                           </button> --}}
                           <button class="z-10">
                              <x:feather-heart
                                 class="w-6 {{ $post->isLike(auth()->user()->id, $post->id) ? 'bg-pink-600' : 'bg-secondary' }} rounded-full p-[2.5px]" />
                           </button>
                           <span
                              class="bg-white text-primary -ml-2 rounded-r-full min-w-[2rem] text-right px-2">{{ $post->likes->count() >= 1000 ? $post->likes->count() / 1000 . 'k' : $post->likes->count() }}</span>
                        </form>
                     </small>
                     <small class="flex items-center">
                        <span class="z-10">
                           <x:feather-message-square class="w-6 bg-secondary-grey rounded-full p-[2.5px]" />
                        </span>
                        <span
                           class="bg-white text-primary -ml-2 rounded-r-full min-w-[2rem] text-right px-2">{{ $post->comments->count() >= 1000 ? $post->comments->count() / 1000 . 'k' : $post->comments->count() }}</span>
                     </small>
                     @if (Request::is('menfess'))
                        <small>By {{ $post->author->disguise($post->author->name) }}</small>
                     @endif
                  </div>

                  <form action="/comment" method="post" class="">
                     @csrf
                     @method('POST')
                     <input type="hidden" name="post_id" value="{{ $post->id }}">
                     <input type="hidden" name="is_menfess" value="{{ Request::is('menfess*') ? true : false }}">
                     <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                     <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                     <input type="hidden" name="notif_trigger_user_id" value="{{ $post->author->id }}">
                     <input id="y" type="text" name="content" placeholder="Comment"
                        class="block bg-secondary-2 border-none rounded-xl mt-3 p-3 pr-6 w-full overflow-x-auto text-xs"
                        value="{{ old('content') }}">

                     <button type="submit" class="flex flex-row-reverse items-center">
                        <x:feather-send class="rotate-45 w-4" />
                        <small class="mt-1">Comment</small>
                     </button>

                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="comment-section" class="p-2">
         <h2 class="font-semibold">Replies..</h2>
         @foreach ($post->comments as $comment)
            <div class="bg-secondary my-2">
               <div>
                  <div class="abosolute flex items-center p-4 z-10">
                     <img src="{{ asset('img/' . $comment->author->avatar) }}" alt="{{ $comment->author->username }}"
                        class="w-10 block rounded-full mr-4 shadow-sm">
                     <div>
                        <p class="flex items-start">
                           <span class="mr-2">
                              {{ Request::is('menfess') ? $comment->author->disguise($comment->author->username) : $comment->author->name }}
                           </span>
                           <a href="/{{ $comment->author->username }}/status" class="text-secondary-grey text-xs">
                              <span>@</span>{{ $comment->author->username }}
                           </a>
                        </p>
                        <p class="text-xs text-secondary-grey">{{ $comment->created_at->diffForhumans() }}</p>
                     </div>
                  </div>
               </div>
               <div class="ml-[4.5rem] text-justify mr-10">
                  <small class="text-[10px !important]">{!! $comment->content !!}</small>
                  @include('partials.replies', ['comment' => $comment, 'post_id' => $post->id])
                  @include('partials.reply', [
                      'replies' => $comment->replies,
                      'comment' => $comment,
                      'post_id' => $post->id,
                  ])
               </div>
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
