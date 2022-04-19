@extends('layouts.main')

@section('content')
   <div>
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
            @foreach ($posts as $post)
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
   @include('partials.updates')
@endsection
