<div>
    <div class="flex justify-around mt-10 px-10 py-2 border-t border-b-2">
        <button wire:click="toggle(1)">Main</button>
        <button wire:click="toggle(2)">About</button>
   </div>
   <div>
       @if ($show == 'tab1')
            @foreach($posts as $post)
                <div class="border shadow mt-5 p-5">
                    <div class="flex">
                        <h5 class="font-medium">{{$post->author->name}}</h5>
                        <h5 class="ml-5 text-xs text-gray-500 pt-1">{{$post->created_at->format('d F Y')}}</h5>
                    </div>
                    <div class="mt-2">
                        <h5 class="text-lg font-bold">{{$post->question}}</h5>
                        @if($post->post_photo)
                        <img class="mt-5" src="{{$post->post_photo}}" alt="post_img" width="500">
                        @endif
                    </div>
                    <footer class="mt-2">
                        <div class="flex ">
                            <div class="flex mr-10 bg-gray-200 p-1 rounded">
                                <button wire:click="postLike({{$post->id}})" class="flex">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="upvote" class="icon_svg-stroke icon_svg-fill" stroke-width="1.5" 
                                        stroke="{{$post->isLikedBy() ? '#4285F4' : '#666'}}" fill="none" fill-rule="evenodd" stroke-linejoin="round"><polygon points="12 4 3 15 9 15 9 20 15 20 15 15 21 15"></polygon></g>
                                    </svg>
                                    <span>{{$post->likes->count()}}</span>
                                </button>
                                <button wire:click="postDislike({{$post->id}})" class="flex ml-2">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="downvote" class="icon_svg-stroke icon_svg-fill" 
                                        stroke="{{$post->isDislikedBy() ? '#DB1F22' : '#666'}}" fill="none" stroke-width="1.5" fill-rule="evenodd" stroke-linejoin="round"><polygon transform="translate(12.000000, 12.000000) rotate(-180.000000) translate(-12.000000, -12.000000) " points="12 4 3 15 9 15 9 20 15 20 15 15 21 15"></polygon></g>
                                    </svg>
                                    <span>{{$post->dislikes->count()}}</span>
                                </button>  
                            </div>
                        </div>   
                    </footer>
                
            </div>
            @endforeach
       @endif

       @if ($show == 'tab2')
       <div>
           tab 2 
       </div>
       @endif
   </div>
</div>
