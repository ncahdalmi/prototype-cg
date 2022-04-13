@extends('layouts.auth')
@section('content')
    <div class="container m-10 sm:max-w-sm bg-slate-800">
        @if (session('success') && !Request::is('register'))
            {{ session('success') }}
        @endif
        @if (session('failed') && !Request::is('register'))
            {{ session('failed') }}
        @endif
        <form action="/{{ Request::is('register') ? 'register' : 'login' }}"
            class="p-5 text-center" method="POST">
            @csrf
            @method('POST')
            <h3 style="text-align: center;">{{ Request::is('register') ? 'Register' : 'Login' }}</h3>
            @if (Request::is('register'))
                <input type="email" name="email" autocomplete="off"
                    style="text-align: center; width:100%; display:block; padding: 10px;" placeholder="email"
                    value="{{ old('email') }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
                <input type="text" name="name" autocomplete="off"
                    style="text-align: center; width:100%; display:block; padding: 10px;" placeholder="name"
                    value="{{ old('name') }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            @endif
            <input style="text-align: center; width:100%; display:block; padding: 10px;" type="text" name="username"
                id="username" autocomplete="off" placeholder="username" value="{{ old('username') }}">
            @error('username')
                <p>{{ $message }}</p>
            @enderror
            <input style="text-align: center; width:100%; display:block; padding: 10px;" type="password" name="password"
                id="password" placeholder="password" value="{{ old('password') }}">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            @if (Request::is('register'))
                <input style="text-align: center; width:100%; display:block; padding: 10px;" type="password"
                    name="retype_password" id="retype_password" placeholder="retype password"
                    value="{{ old('retype_password') }}">
                @error('retype_password')
                    <p>{{ $message }}</p>
                @enderror
            @endif
            <button type="submit"
                style="margin-top: 20px; padding: 5px">{{ Request::is('register') ? 'Register' : 'Login' }}</button>
            <br>
            @if (!Request::is('register'))
                <small>Not registered? <a href="/register" style="text-decoration: none; ">Register now</a></small>
            @else
                <small>Alredy registered? <a href="/" style="text-decoration: none; ">Login</a></small>
            @endif
        </form>
    </div>
@endsection
