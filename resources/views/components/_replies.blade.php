@foreach ($replies as $reply)
<div class="mt-8">
    <div class="flex">
        <div>
            <img src="{{asset('/default-user.png')}}" alt="avatar" height="30" width="30">
        </div>
        
        <div>
            <div class="flex">
                <h5 class="font-medium">{{$reply->author->name}}</h5>
                <h5 class="ml-5 text-xs text-gray-500 pt-1">{{$reply->created_at->format('d F Y')}}</h5>
            </div>
            
            <p>{{$reply->comment}} </p>
            <footer class="flex">
                <button wire:click="replyLike({{$reply->id}})" class="flex">
                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="upvote" class="icon_svg-stroke icon_svg-fill" stroke-width="1.5" 
                        stroke="{{$reply->isLikedBy() ? '#4285F4' : '#666'}}" 
                        fill="none" fill-rule="evenodd" stroke-linejoin="round"><polygon points="12 4 3 15 9 15 9 20 15 20 15 15 21 15"></polygon></g>
                    </svg>
                    <span class="font-light">Upvote</span>
                    <span class="font-light ml-1">{{$reply->likes->count()}}</span>
                </button>

                <button wire:click="replyDislike({{$reply->id}})" class="flex ml-1">
                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="downvote" class="icon_svg-stroke icon_svg-fill" 
                        stroke="{{$reply->isDislikedBy() ? '#DB1F22' : '#666'}}" fill="none" stroke-width="1.5" fill-rule="evenodd" stroke-linejoin="round"><polygon transform="translate(12.000000, 12.000000) rotate(-180.000000) translate(-12.000000, -12.000000) " points="12 4 3 15 9 15 9 20 15 20 15 15 21 15"></polygon></g>
                    </svg>
                    <span class="font-light">Downvote</span>
                    <span class="font-light ml-1">{{$reply->dislikes->count()}}</span>
                </button>
            </footer>
        </div>
        @if(auth()->user()->id == $reply->author->id || auth()->user()->id == $reply->post->author->id)
        <div>
            <button wire:click="deleteReply({{$reply->id}})" class="ml-10 font-extralight bg-gray-100 px-1 rounded">X</button>
        </div>
        @endif
        
    </div>


    
    
   
    
</div>
@endforeach