<div class="bg-secondary p-2 rounded-2xl h-80 w-full">
    <h3 class="font-semibold">Notifications.</h3>
    <div>
        @foreach ($notifs->where('show', true) as $notif)
            <div class="bg-secondary-2 py-2 px-3 text-xs rounded-xl relative mb-2 flex justify-between items-start">
                <span>{{ $notif->notifMessage($notif->type, $notif->from_username) }}</span>

                <div>
                    @if (Route::is('menfess*'))
                        <a class="text-purpink font-medium rounded-full py-1 px-2 transition-all duration-150 hover:text-white hover:bg-purpink"
                            href="/menfess/{{ $notif->post->post_code }}">Details..</a>
                    @else
                        <a class="text-purpink font-medium rounded-full py-1 px-2 transition-all duration-150 hover:text-white hover:bg-purpink"
                            href="/{{ $notif->post->author->username }}/status/{{ $notif->post->post_code }}">Details..</a>
                    @endif
                    <form action="{{ route('notif.unshow') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="notif_id" value="{{ $notif->id }}">
                        <button class="absolute right-0 top-1 group">
                            <x:feather-x class="w-6 text-purpink group-hover:scale-90 transition-all" />
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
