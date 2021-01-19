<div x-data="{open: false}">
    <button @click= "open = true" class="ml-20 font-thin">x</button>
    <div class="absolute bg-white p-6 shadow-2xl" x-show="open">
        <h5>Are you sure you want to delete ?</h5>
        <div>
            <button class="mt-5 ml-5 bg-red-500 rounded-full shadow py-2 px-5 text-white text-xs" wire:click="deletePost({{$post->id}})">Ok</button>
            <button class="mt-5 ml-5 bg-blue-500 rounded-full shadow py-2 px-2 text-white text-xs" @click = "open = false" @click.away= "open = false">Cancel</button>
        </div>
    </div>
</div>