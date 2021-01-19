<ul>
    @foreach($follows as $follow)
    <li class="flex mb-3">
        <a href="{{route('profile', $follow->name)}}" class="flex">
        <img class="rounded-lg mr-2 h-8" src="{{$follow->avatar}}"  width="30" alt="avatar">{{$follow->name}}
        </a>
    </li>
    @endforeach
</ul>