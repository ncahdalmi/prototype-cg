<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            background-color: darkgray
        }

    </style>
</head>

<body>
    <div style="display: flex;">

        <div style="width: 30%">
            <div>
                <div style="width:30px;height:30px; border-radius:50%; background-color: aqua"></div>
                <p>{{ auth()->user()->name }}</p>
                <div style="display: flex">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
            <ul style="width: 100%; list-style: none">
                <li style="margin-bottom: 5px; background-color: grey; padding: 10px"><a href="#">Logo</a></li>
                <li style="margin-bottom: 5px; background-color: grey; padding: 10px"><a href="/home">Home</a></li>
                <li style="margin-bottom: 5px; background-color: grey; padding: 10px"><a href="/menfess">Menfess</a>
                </li>
                <li style="margin-bottom: 5px; background-color: grey; padding: 10px">
                    <form action="/logout" method="POST">@csrf<button type="submit">Logout</button></a></form>
                </li>
                <li style="margin-bottom: 5px; background-color: grey; padding: 10px">
                    <a href="#">
                        <button>Post</button>
                    </a>
                </li>
            </ul>
        </div>

        <div style="width: 35%%; padding: 10px">
            @yield('content')
        </div>
        <div style="width: 35%;">
            @yield('notifications')
        </div>
    </div>
</body>

</html>
