<div class="border shadow p-2 ">
    <div class="flex mb-2">
        <img src="{{asset('/user.jpg')}}" alt="" height="20" width="20">
        <p class="text-xs">{{auth()->user()->name}}</p>
    </div>
    <form wire:submit.prevent="post">
        <textarea wire:model.debounce.2s="postQuestion" cols="50" rows="4" placeholder="   Got any question ?"></textarea>
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