<div class="bg-secondary p-2 rounded-2xl">
    <h2 class="text-primary-white font-semibold text-sm mb-2">Menfess Update For You.</h2>
    @foreach ($posts as $post)
        <div
            class="bg-secondary-2 p-2 roundec-2xl rounded-2xl mb-1 flex items-center group transition-all hover:bg-primary cursor-pointer">
            <x:feather-circle class="stroke-purpink w-6 stroke-3 transition-all group-hover:fill-purpink" />
            <a class="text-secondary-grey text-sm ml-2 transition-all group-hover:text-primary-white"
                href="{{ route('menfess.show', ['posts' => $post]) }}">
                {{ strip_tags(\Illuminate\Support\Str::words($post->subject, 2, '...')) }}</a>
        </div>
    @endforeach
    <a href="{{ route('menfess') }}" class="italic font-semibold text-xs text-purpink">Show All</a>
</div>
