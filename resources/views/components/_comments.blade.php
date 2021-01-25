@foreach ($comments as $comment)
<div class="mt-10">
    <div class="flex">
        <div>
            <img src="{{asset('/default-user.png')}}" alt="avatar" height="30" width="30">
        </div>
        
        <div>
            <div class="flex">
                <h5 class="font-medium">{{$comment->author->name}}</h5>
                <h5 class="ml-5 text-xs text-gray-500 pt-1">{{$comment->created_at->format('d F Y')}}</h5>
                @if(auth()->user()->id == $comment->post->author->id)
                    @if($comment->best_answer)
                        <button wire:click="bestAnswer({{$comment->id}})" class="ml-3 bg-red-100 text-red-600 rounded-full shadow py-2 px-2 text-xs">Unmark as Best</button>
                    @else
                    @if($show) 
                        <button wire:click="bestAnswer({{$comment->id}})" class="ml-3 bg-green-100 text-green-600 rounded-full shadow py-2 px-2 text-xs">Mark as Best</button>
                    @endif
                    @endif
                    
                @endif
                @if($comment->best_answer)
                <p class="ml-3 bg-green-100 text-green-600 rounded-full shadow py-2 px-2 text-xs">Best Answer</p>
                @endif
            </div>
            
            <p>{{$comment->comment}} </p>
            <footer class="flex">
                <button wire:click="commentLike({{$comment->id}})" class="flex">
                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="upvote" class="icon_svg-stroke icon_svg-fill" stroke-width="1.5" 
                        stroke="{{$comment->isLikedBy() ? '#4285F4' : '#666'}}" 
                        fill="none" fill-rule="evenodd" stroke-linejoin="round"><polygon points="12 4 3 15 9 15 9 20 15 20 15 15 21 15"></polygon></g>
                    </svg>
                    <span class="font-light">Upvote</span>
                    <span class="font-light ml-1">{{$comment->likes->count()}}</span>
                </button>

                <button wire:click="commentDislike({{$comment->id}})" class="flex ml-1">
                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="downvote" class="icon_svg-stroke icon_svg-fill" 
                        stroke="{{$comment->isDislikedBy() ? '#DB1F22' : '#666'}}" fill="none" stroke-width="1.5" fill-rule="evenodd" stroke-linejoin="round"><polygon transform="translate(12.000000, 12.000000) rotate(-180.000000) translate(-12.000000, -12.000000) " points="12 4 3 15 9 15 9 20 15 20 15 15 21 15"></polygon></g>
                    </svg>
                    <span class="font-light">Downvote</span>
                    <span class="font-light ml-1">{{$comment->dislikes->count()}}</span>
                </button>
                
                <button wire:click="commentReply({{$comment->id}})" class="flex ml-5">
                    <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="reply" class="icon_svg-stroke" 
                        stroke="#666" fill="none" stroke-width="1.5" fill-rule="evenodd" 
                        stroke-linejoin="round" transform="translate(3.000000, 4.000000)">
                        <path d="M9.000105,-1.000105 L1.00010503,8.77767273 L6.33343837,8.77767273 C6.78266665,10.7041069 7.5048889,12.2782512 8.500105,13.5001056 C9.4953212,14.72196 10.9953212,15.8886267 13.000105,17.0001056 C12.3415905,15.6668556 11.8428105,14.1668556 11.5037651,12.5001056 C11.1647197,10.8333556 11.2190553,9.59254473 11.6667717,8.77767273 L17.000105,8.77767273 L9.000105,-1.000105 Z" id="Path" transform="translate(9.000105, 8.000000) scale(-1, 1) rotate(90.000000) translate(-9.000105, -8.000000) "></path></g>
                    </svg>
                    <span>Reply</span>
                    <span class="ml-2 font-thin">{{$comment->reply_count}}</span>

                </button>
            </footer>
            @if($reply == $comment->id)
            @livewire('reply', ['commentId' => $comment->id, 'postId' => $postId], key($comment->id))
            @endif
        </div>
        @if(auth()->user()->id == $comment->author->id || auth()->user()->id == $comment->post->author->id)
        <div>
            <button wire:click="deleteComment({{$comment->id}})" class="ml-10 font-extralight bg-gray-100 px-1 rounded">X</button>
        </div>
        @endif
        
    </div>


    
    
   
    
</div>
@endforeach