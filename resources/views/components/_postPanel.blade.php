<div class="border shadow p-5 ">
    <div class="flex mb-2">
        <img class="rounded-lg h-8" src="{{auth()->user()->avatar}}" alt="avatar" width="30">
        <p class="ml-3 font-medium">{{auth()->user()->name}}</p>
    </div>
    <form wire:submit.prevent="post">
        <textarea style="resize: none" class="w-full border rounded-3xl p-3 focus:outline-none focus:ring-1" wire:model.debounce.2s="postQuestion" rows="4" placeholder="   Got any question ?"></textarea>
        <footer class="flex mt-2">
            <div>
                <label for="file-input">
                    <img src="/addImageIcon.png" width="40"/>
                </label>

                <input id="file-input" wire:model="postPhoto" type="file" style="display: none; cursor: pointer"/>
            </div>
            @if ($postPhoto)
            <img src="{{ $postPhoto->temporaryUrl() }}" width="100" height="80">
            @endif
            <button type="submit" class="bg-red-500 p-1 text-m text-white rounded relative left-2/3">Post Question</button>
        </footer>
        @error('postQuestion')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror
        @error('postPhoto')
            <span class="text-red-500 text-xs"> {{$message}}</span>
        @enderror
    </form>
    
    
    
</div>