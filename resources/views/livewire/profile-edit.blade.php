<div class="mx-auto max-w-lg mt-10">
    <form wire:submit.prevent="editProfile">
        <div class="mt-5 flex flex-col">
            <label class="mb-2 font-bold">Name</label>
            <input name="userName" 
            class="ml-2 border rounded-3xl {{$errors->has('userName') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
            type="text"
            wire:model="userName"
            >
            @error('userName')
                <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label class="mb-2 font-bold">Email</label>
            <input name="email" 
            class="ml-2 border rounded-3xl {{$errors->has('email') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
            type="email" 
            wire:model="email"
            >
            @error('email')
                <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label class="mb-2 font-bold">Your Password</label>
            <input name="oldPassword" 
            class="ml-2 border rounded-3xl {{$errors->has('oldPassword') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
            type="password" 
            wire:model.debounce.5s="oldPassword"
            >
            @error('oldPassword')
                <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label class="mb-2 font-bold">New Password</label>
            <input name="password" 
            class="ml-2 border rounded-3xl {{$errors->has('password') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
            type="password" 
            wire:model="password"
            >
            @error('password')
                <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label class="mb-2 font-bold">Confirm Password</label>
            <input name="password_confirmation" 
            class="ml-2 border rounded-3xl {{$errors->has('password') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
            type="password" 
            wire:model="password_confirmation"
            >
            @error('password_confirmation')
                <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex flex-col">
            <label class="mb-2 font-bold">Bio</label>
            <textarea name="bio" 
            class="ml-2 border rounded-3xl {{$errors->has('bio') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
            wire:model="bio" 
            cols="30" rows="5"
            ></textarea>
            @error('bio')
                <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-5 flex">
            <div>
                @if($avatar)
                    @if(is_string($avatar))
                        <img class="rounded-3xl w-20 h-20 mr-5" src="{{ $avatar}}" alt="pp">
                    @else
                    <img class="rounded-3xl w-20 h-20 mr-5" src="{{ $avatar->temporaryUrl() }}" alt="pp">
                    @endif
                @endif
            </div>
            <div class="flex flex-col">
                <label class="mb-2 font-bold">Profile Pic</label>
                <input name="avatar" 
                class="ml-2 border rounded-3xl {{$errors->has('avatar') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
                type="file" 
                wire:model="avatar"
                >
                @error('avatar')
                    <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>
            
        </div>

        <div class="mt-5 flex">
            <div>
                @if($cover)
                    @if(is_string($cover))
                        <img class="w-20 h-20 mr-5" src="{{$cover}}" alt="pp">
                    @else 
                        <img class="w-20 h-20 mr-5" src="{{ $cover->temporaryUrl() }}" alt="pp">
                    @endif
                @endif
            </div>
            <div class="flex flex-col">
                <label class="mb-2 font-bold">Cover Photo</label>
                <input name="cover" 
                class="ml-2 border rounded-3xl {{$errors->has('cover') ? 'ring-1 ring-red-500' : null}} p-3 focus:outline-none focus:ring-1" 
                type="file" 
                wire:model="cover"
                >
                @error('cover')
                    <span class="text-center mt-2 text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>
            
        </div>
        <a href="{{ URL::previous() }}" class="mt-5 bg-gray-500 rounded-full shadow py-2 px-2 text-white text-md">Cancel</a>
        <button class="mt-5 ml-5 bg-blue-500 rounded-full shadow py-2 px-2 text-white text-md">Update</button>

    </form>
</div>

