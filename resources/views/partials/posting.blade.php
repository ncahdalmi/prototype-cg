<div class="bg-secondary p-4">
   <div class="text-primary-white">
      <div class="flex items-center p-4">
         <img src="{{ asset('img/' . auth()->user()->profileImg) }}" alt="{{ auth()->user()->profileImg }}"
            class="w-10 block rounded-full mr-4">
         <p class="">
            <span class="block text-xl">
               {{ Request::is('menfess')? auth()->user()->disguise(auth()->user()->username): auth()->user()->name }}
            </span>
            <small class="block m-0">
               <span>@</span>{{ auth()->user()->username }}
            </small>
         </p>
      </div>
   </div>

   <form action="/create" method="POST">
      @csrf
      @method('POST')
      @if (Request::is('menfess'))
         <input type="text" name="subject" placeholder="Subject">
      @endif
      <input type="hidden" name="is_menfess" value="{{ Request::is('menfess*') ? true : false }}">
      <input id="x" type="hidden" name="content">
      <trix-editor id="wyswyg-editor" input="x" class="bg-secondary-2 border-none rounded-xl"></trix-editor>
      <input type="hidden" name="post_category_id" value="{{ Request::is('menfess') ? 2 : 1 }}">
      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
      <button type="submit" class="btn-primary group">
         <span class="btn-primary__text">Post</span>
      </button>
   </form>
</div>
