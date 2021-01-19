<div class="border shadow p-5">

    <h5 class="font-bold border-b">Spaces to Follow</h5>
<div class="mt-5 ">
   <ul>
       @foreach($randomUsers as $user)
       <li class="mb-5">
           <a href="{{route('profile', $user->name)}}">
           <div class="flex">
                <img class="h-10 max-h-10 mr-2 rounded-lg" src="{{$user->avatar}}" alt="avatar" width="40" height="30">
                <div>
                    <h5 class="font-medium">{{$user->name}}</h5>
                    <p class="text-xs text-gray-500 ">{{$user->bio}}</p>
                </div>
                
            </div>   
            </a> 
       </li>
       @endforeach
   </ul>
</div>
</div>