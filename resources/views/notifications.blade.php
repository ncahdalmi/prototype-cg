<div class="bg-secondary p-2 rounded-2xl my-2">
   <h3 class="font-semibold">Notifications.</h3>
   <div>
      @foreach ($notifs->where('show', true) as $notif)
         <div class="bg-secondary-2 py-2 px-3 text-xs rounded-xl relative">
            <span>{{ $notif->notifMessage($notif->type, $notif->from_username) }}</span>
            <a class="text-purpink font-medium rounded-full py-1 px-2 transition-all duration-150 hover:text-white hover:bg-purpink"
               href="/{{ $notif->post->author->username }}/status/{{ $notif->post->post_code }}">Details..</a>
            <form action="{{ route('notif.unshow') }}" method="post">
               @csrf
               @method('POST')
               <input type="hidden" name="notif_id" value="{{ $notif->id }}">
               <button class="absolute right-1 top-1 group">
                  <x:feather-x class="w-6 text-purpink group-hover:scale-90 transition-all" />
               </button>
            </form>
         </div>
      @endforeach
   </div>
</div>
