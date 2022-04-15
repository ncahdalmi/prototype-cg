<div class="bg-secondary pb-10 rounded-2xl">
   <div class="w-full relative flex flex-col mb-10">
      <div class="h-32 bg-gradient-to-r from-sky-500 to-indigo-500"></div>
      <img src="{{ asset('img/' . $author->avatar) }}" alt="{{ $author->name }}"
         class="rounded-full w-[20%] absolute left-1/2 -translate-x-1/2 top-3/4 -translate-y-1/3 sm:-translate-y-3/4 sm:w-[10%]">
   </div>
   <div class="text-center">
      <p class="capitalize ">{{ $author->name }}</p>
      <small class="text-secondary-grey">
         <span>@</span>
         <span>{{ $author->username }}</span>
      </small>
      <div class="flex">
         <div class="w-1/2">
            <p class="text-xs text-secondary-grey flex flex-col">
               <span class="text-3xl text-primary-white font-semibold">{{ $author->following->count() }}</span>
               <span>Following</span>
            </p>
         </div>
         <div class="w-1/2">
            <p class="text-xs text-secondary-grey flex flex-col">
               <span class="text-3xl text-primary-white font-semibold">{{ $author->follower->count() }}</span>
               <span>Followers</span>
            </p>
         </div>
      </div>
      <div class="flex justify-center mt-10">
         <a href="/{{ $author->username }}/status"
            class="btn-secondary {{ Request::get('data') == null ? 'btn-secondary__active' : null }}">Post</a>
         <a href="?data=media"
            class="btn-secondary {{ Request::get('data') == 'media' ? 'btn-secondary__active' : null }}">Media</a>
         <a href="?data=following"
            class="btn-secondary {{ Request::get('data') == 'following' ? 'btn-secondary__active' : null }}">Following</a>
         <a href="?data=follower"
            class="btn-secondary {{ Request::get('data') == 'follower' ? 'btn-secondary__active' : null }}">Follower</a>
      </div>
   </div>
</div>
