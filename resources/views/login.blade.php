@extends('layouts.auth')
@section('content')
    <div class="container w-full h-full md:h-auto bg-primary sm:max-w-sm rounded-2xl md:bg-secondary">
        @if (session('success') && !Request::is('register'))
            {{ session('success') }}
        @endif
        @if (session('failed') && !Request::is('register'))
            {{ session('failed') }}
        @endif
        <form action="/{{ Request::is('register') ? 'register' : 'login' }}" class="p-5" method="POST">
            @csrf
            @method('POST')
            <h3 class="text-left text-3xl font-semibold flex items-center mb-5 text-purpink">
                {{ Request::is('register') ? 'Register' : 'Login' }}</h3>
            @if (Request::is('register'))
                <label for="email" class="flex flex-col mb-2">
                    <span class="text-left">Email</span>
                    <input type="email" name="email" autocomplete="off"
                        class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary"
                        placeholder="enter email" value="{{ old('email') }}" id="email">
                    @error('email')
                        <p class="text-pink-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </label>
                <label for="name" class="flex flex-col mb-2">
                    <span class="text-left">Name</span>
                    <input type="text" name="name" autocomplete="off"
                        class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary"" placeholder="
                        enter name" value="{{ old('name') }}" id="name">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </label>
            @endif
            <label for="username" class="flex flex-col mb-2">
                <span class="text-left">Username</span>
                <input type="text" username="username" autocomplete="off"
                    class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary""
                                                                        placeholder=" enter username"
                    value="{{ old('username') }}" id="username">
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </label>
            <label for="password" class="flex flex-col mb-2">
                <span class="text-left">password</span>
                <input
                    class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary"" type="
                    password" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </label>
            @if (Request::is('register'))
                <label for="retype_password" class="flex flex-col mb-2">
                    <span class="text-left">Re-type Password</span>
                    <input
                        class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary"" type="
                        password" name="retype_password" id="retype_password" placeholder="retype password"
                        value="{{ old('retype_password') }}">
                    @error('retype_password')
                        <p>{{ $message }}</p>
                    @enderror
                </label>
            @endif
            <div class="text-right my-4">
                <button type="submit"
                    class="py-2 px-4 bg-purpink rounded-2xl my-4">{{ Request::is('register') ? 'Register' : 'Login' }}</button>
                @if (!Request::is('register'))
                    <small class="block">Not registered? <a href="/register"
                            style="text-decoration: none; ">Register now</a></small>
                @else
                    <small class="block">Alredy registered? <a href="/"
                            style="text-decoration: none; ">Login</a></small>
                @endif
            </div>
        </form>
    </div>
@endsection
