@extends('layouts.main')

@section('content')
   <div>
      {{-- @include('partials.posting') --}}
   </div>
   <div class="bg-primary mt-14">

      @foreach ($posts as $post)
         <div class="relative bg-secondary m-2 p-2 pb-8 block rounded-[15px]">
            <div class="abosolute flex items-center p-4 z-10">
               <img src="{{ asset('img/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}"
                  class="w-10 block rounded-full mr-4 shadow-sm">
               <div>
                  <p class="flex items-start">
                     <span class="mr-2">
                        {{ Request::is('menfess')? auth()->user()->disguise(auth()->user()->username): auth()->user()->name }}
                     </span>
                     <a href="/{{ $post->author->username }}/status" class="text-secondary-grey mt-[3px] text-xs">
                        <span>@</span>{{ auth()->user()->username }}
                     </a>
                  </p>
                  <p class="text-xs text-secondary-grey">{{ $post->created_at->diffForhumans() }}</p>
               </div>
            </div>
            <a class="block"
               href="/{{ Request::is('menfess')? 'menfess/' . $post->post_code: $post->author->username . '/status/' . $post->post_code }}">
               <div class="ml-[4.5rem] text-justify mr-10">
                  <div class="mb-2 text-xs font-inter">
                     <p>
                        {{ Request::is('menfess*') ? $post->subject : null }}
                     </p>
                     <p class="">
                        {{ strip_tags(\Illuminate\Support\Str::words($post->content, 20, '...')) }}
                     </p>
                  </div>
                  <div class="mt-4 flex justify-start">
                     <small class="mr-4 ">
                        <form action="/like" method="post" class="flex items-center">
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
               </div>
            </a>
         </div>
      @endforeach
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
