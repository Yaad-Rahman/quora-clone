<div class="mx-auto max-w-lg mt-10">
    <form wire:submit.prevent="editProfile">
        <div class="mt-5 flex flex-col">
            <label>Name</label>
            <input name="name" 
            class="ml-2 border rounded-3xl p-3 focus:outline-none focus:ring-1" 
            type="text"
            wire:model="name"
            >
            @error('name')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label>Email</label>
            <input name="email" 
            class="ml-2 border rounded-3xl p-3 focus:outline-none focus:ring-1" 
            type="email" 
            wire:model="email"
            >
            @error('email')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label>Password</label>
            <input name="password" 
            class="ml-2 border rounded-3xl p-3 focus:outline-none focus:ring-1" 
            type="password" 
            wire:model="password"
            >
            @error('password')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label>Confirm Password</label>
            <input name="password_confirmation" 
            class="ml-2 border rounded-3xl p-3 focus:outline-none focus:ring-1" 
            type="password" 
            wire:model="password_confirmation"
            >
            @error('password_confirmation')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label>Bio</label>
            <textarea name="bio" 
            class="ml-2 border rounded-3xl p-3 focus:outline-none focus:ring-1" 
            wire:model="bio" 
            cols="30" rows="5"
            ></textarea>
            @error('bio')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex">
            <div>
                @if($proPic)
                <img class="rounded-3xl w-20 h-20" src="{{ $proPic->temporaryUrl() }}" alt="pp">
                @endif
            </div>
            <div class="flex flex-col">
                <label>Profile Pic</label>
                <input name="proPic" 
                class="ml-2 border rounded-3xl p-3 focus:outline-none focus:ring-1" 
                type="file" 
                wire:model="proPic"
                >
                @error('proPic')
                    <span>{{$message}}</span>
                @enderror
            </div>
            
        </div>

        <div class="mt-5 flex">
            <div>
                @if($cover)
                <img src="{{ $cover->temporaryUrl() }}" alt="pp">
                @endif
            </div>
            <div class="flex flex-col">
                <label>Cover Photo</label>
                <input name="cover" 
                class="ml-2 border rounded-3xl p-3 focus:outline-none focus:ring-1" 
                type="file" 
                wire:model="cover"
                >
                @error('cover')
                    <span>{{$message}}</span>
                @enderror
            </div>
            
        </div>
        <button class="mt-5 bg-blue-500 rounded-full shadow py-2 px-2 text-white text-xs">Update</button>
    </form>
</div>

