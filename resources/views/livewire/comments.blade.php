<div class="mt-5">
    <form wire:submit.prevent="postComment" class="flex">
        <img src="{{asset('/default-user.png')}}" alt="avatar" width="30" height="30">
        <input class="ml-2 border rounded-3xl px-5 focus:outline-none focus:ring-1" wire:model="comment" type="text" placeholder="Add Comment">
        <button class="ml-5 bg-blue-500 text-white p-1 px-2 rounded-2xl" type="submit">Add Comment</button>
    </form>

    @include('components._comments')

</div>
