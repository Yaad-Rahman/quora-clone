@foreach ($comments as $comment)
<div>
    <div class="flex">
        <div>
            <img src="{{asset('/default-user.png')}}" alt="avatar" height="30" width="30">
        </div>
        
        <div>
            <div class="flex">
                <h5 class="font-medium">{{$comment->author->name}}</h5>
                <h5 class="ml-5 text-xs text-gray-500 pt-1">{{$comment->created_at->format('d F Y')}}</h5>
            </div>
            
            <p>{{$comment->comment}} </p>
            <footer>
                <button wire:click="commentLike({{$comment->id}})" class="flex">
                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="upvote" class="icon_svg-stroke icon_svg-fill" stroke-width="1.5" 
                        {{-- stroke="{{$liked ? '#4285F4' : '#666'}}"  --}}
                        fill="none" fill-rule="evenodd" stroke-linejoin="round"><polygon points="12 4 3 15 9 15 9 20 15 20 15 15 21 15"></polygon></g>
                    </svg>
                    <span class="font-light">Upvote</span>
                    <span class="font-light ml-1">{{$comment->likes->count()}}</span>
                </button>
            </footer>
        </div>
        
    </div>
    
   
    
</div>
@endforeach