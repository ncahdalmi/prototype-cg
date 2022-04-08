<div style="width: 100%; background-color: lightgray">
    <h3>Notifications</h3>
    <ul>
        @foreach ($notifs as $notif)
            <li>{{ $notif->notifMessage($notif->type, $notif->from_username) }}</li>
        @endforeach
    </ul>
</div>
