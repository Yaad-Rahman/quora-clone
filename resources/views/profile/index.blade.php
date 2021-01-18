@extends('layouts.master')

@section('content')

<div class="grid grid-cols-3 gap-10 mt-10 mx-10">
    <div class="col-span-2 border shadow">
        <div class="relative mb-20">
         <img src="{{$user->cover}}" alt="cover" style="height: 300px; width: 100%">
         <img class="absolute -bottom-10 ring-2 left-10" src="{{$user->avatar}}" alt="avatar" height="100" width="100">
        </div>
        <div class="px-10">
         <h3 class="font-bold text-2xl">{{$user->name}}</h3>
         <p class="font-thin">{{$user->bio}}</p>
        
        <div class="flex">
            @if (auth()->user()->is($user))
            @else
            <form action="/profiles/{{$user->name}}/follow" method="POST">
                @csrf
                <button type="submit" class="mt-5 bg-blue-500 rounded-full shadow py-2 px-2 text-white text-xs">
                    {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
                </button>
            </form> 
            @endif
            @if(auth()->user()->is($user))
            <a href="{{route('profile.edit', $user)}}" class="mt-5 bg-gray-500 ml-3 rounded-full shadow py-2 px-2 text-white text-xs">Edit Profile</a>
            @endif
        </div>
        </div> 
        
        @livewire('profile-footer', ['user' => $user], key($user->id))

    </div>
    <div>
        <h2>Follows {{$user->follows->count()}} people</h2>
        <h2>Followers {{$user->followers($user)}}</h2>
    </div>
 </div>
    
@endsection