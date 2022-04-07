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
        <ul style="width: 30%; list-style: none">
            <li style="margin-bottom: 5px; background-color: grey; padding: 10px"><a href="#">Logo</a></li>
            <li style="margin-bottom: 5px; background-color: grey; padding: 10px"><a href="/">Home</a></li>
            <li style="margin-bottom: 5px; background-color: grey; padding: 10px"><a href="/menfess">Menfess</a></li>
            <li style="margin-bottom: 5px; background-color: grey; padding: 10px"><a href="#">Logout</a></li>
            <li style="margin-bottom: 5px; background-color: grey; padding: 10px">
                <a href="#">
                    <button>Post</button>
                </a>
            </li>
        </ul>
        <div style="width: 35%%; padding: 10px">
            @yield('content')
        </div>
        <div style="width: 35%;">
            <h4>Notification</h4>
            <div style="background-color: grey; margin-bottom: 5px; padding: 10px">Notif</div>
            <div style="background-color: grey; margin-bottom: 5px; padding: 10px">Notif</div>
            <div style="background-color: grey; margin-bottom: 5px; padding: 10px">Notif</div>
        </div>
    </div>
</body>

</html>
