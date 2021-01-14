<div>
    <form class="flex" wire:submit.prevent="postReply">
        <img src="{{asset('/default-user.png')}}" alt="avatar" width="30" height="30">
        <input class="ml-2 border rounded-3xl pl-5 focus:outline-none focus:ring-1" wire:model="reply" type="text" placeholder="Add Reply">
        <button class="ml-5 bg-blue-500 text-white p-1 px-2 rounded-2xl" type="submit">Add Reply</button>
    </form>
    
</div>