<div class="bg-secondary rounded-2xl mt-2 p-2">
    @foreach ($following as $follow)
        <div class="bg-secondary-2 p-1 rounded-2xl mb-2 flex">
            <div class="rounded-full bg-purpink w-6 h-6"></div>
            <a class="ml-2"
                href="/{{ $follow->followed_username }}/status">{{ $follow->followed_username }}</a>
        </div>
    @endforeach
</div>
