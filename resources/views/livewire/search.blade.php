<div>
    <input wire:focus="selectSearch" wire:model="search" class="border rounded-3xl pl-5 focus:outline-none focus:ring-1" type="text" placeholder="Search Quora">
    
    <div class="absolute bg-white max-w-64 w-64 rounded-lg shadow-2xl">
        <ul>
            @if($show)
            @if($posts)
            <li class="flex px-1 border-b-2">
                <i class="fa fa-search" aria-hidden="true"></i>
                <h4 class="text-sm font-bold mr-2">Search:</h4>
                <h4 class="text-sm">{{$search}}</h4>
            </li>
            @forelse ($posts as $post)
            <a href="{{route('profile', $post->author->name)}}">
                <li class="py-2 px-1 text-xs border-b-2 flex hover:bg-red-50 hover:text-red-700">
                    <div class="mr-2">
                        <img src="{{$post->author->avatar}}" alt="avatar" height="20" width="20">
                        <h4 class="text-xs font-bold">{{$post->author->name}}</h4>
                    </div>
                    
                    <h4>{{Str::limit($post->question, 45 , '...')}}</h4>
                </li>
            @empty 
                <li>No results found...</li>
            </a>
            @endforelse
            @endif
            @endif
        </ul>
    </div>
</div>
