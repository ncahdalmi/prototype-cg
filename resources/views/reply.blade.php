@foreach ($replies as $reply)
    <div
        style="background-color: grey; margin-left:20px margin-bottom: 5px; padding: 10px; border-bottom: 1px solid lightgray">
        <div style="display: flex; align-items: center;justify-content: flex-start">
            <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
            <p style="font-weight: bold">
                {{ Request::is('menfess*') ? $reply->author->disguise($reply->author->name) : $reply->author->name }}
            </p>
        </div>
        <p>{{ $reply->content }}</p>
    </div>
    @include('replies')
@endforeach
