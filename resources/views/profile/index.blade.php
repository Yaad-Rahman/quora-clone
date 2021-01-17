@extends('layouts.master')

@section('content')

<div class="grid grid-cols-3 gap-10 mt-10 mx-10">
    <div class="col-span-2 border shadow">
        <div class="relative mb-20">
         <img src="{{asset('/cancer.jpg')}}" alt="cover" style="height: 300px; width: 100%">
         <img class="absolute -bottom-10 ring-2 left-10" src="{{asset('/default-user.png')}}" alt="avatar" height="100" width="100">
        </div>
        <div class="px-10">
         <h3 class="font-bold text-2xl">{{$user['name']}}</h3>
         <p class="font-thin">This space is about science. From physics, chemistry, genetics and the universe!</p>
        
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
        <div class="flex justify-around mt-10 px-10 py-2 border-t border-b-2">
             <h2>Main</h2>
             <h2>About</h2>
        </div>
    </div>
    <div>
        <h2>People 1.4M</h2>
    </div>
 </div>
    
@endsection