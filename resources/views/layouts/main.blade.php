<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  @include('partials.font')
  @trixassets
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="font-poppins bg-primary text-primary-white">
  <div class="hidden"></div>
  <div class="grid">
    <div>
      @yield('profile')
      @yield('updates')
    </div>
    <div>
      @yield('content')
    </div>
    <div>
      @yield('notifications')
    </div>
  </div>
</body>

</html>
