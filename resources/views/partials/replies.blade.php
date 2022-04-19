<div class="pb-2">
   <form action="{{ route('comment.reply') }}" method="post">
      {{-- @dd($comment) --}}
      @csrf
      @method('POST')
      <input type="hidden" name="is_menfess" value="{{ Request::is('menfess*') ? true : false }}">
      <input type="hidden" name="post_id" value="{{ $post_id }}">
      <input type="hidden" name="parent_id" value="{{ $comment->id }}">
      <input type="hidden" name="notif_trigger_user_id" value="{{ $comment->author->id }}">
      <input type="text" id="reply" name="reply" placeholder="Comment" value="{{ old('reply') }}"
         class="block bg-slate-700 border-none rounded-xl my-3 p-3 pr-6 w-full overflow-x-auto text-xs">

      {{-- <trix-editor input="reply"
            class="block bg-secondary-2 border-none rounded-xl my-3 pr-6 w-full overflow-x-auto text-xs">
         </trix-editor> --}}
      <button type="submit" class="flex flex-row-reverse items-center">
         <x:feather-send class="rotate-45 w-4" />
         <small class="mt-1">Reply</small>
      </button>
   </form>
</div>
