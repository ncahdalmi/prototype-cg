<div style="margin-left: 20px">
    <form action="{{ route('comment.reply') }}" method="post" onsubmit="preventDefault()">
        {{-- @dd($comment) --}}
        @csrf
        @method('POST')
        <input type="hidden" name="post_id" value="{{ $post_id }}">
        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
        <input type="hidden" name="notif_trigger_user_id" value="{{ $comment->author->id }}">
        <input style="display: block; width:100%; padding: 5px" type="text" name="reply" placeholder="Comment"
            value="{{ old('reply') }}">
        <button type="submit">Reply</button>
    </form>
</div>
