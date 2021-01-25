@foreach($posts as $post)
    <div class="border shadow mt-5 p-5">
    <div class="flex">
        <img class="rounded-3xl h-11 mr-2" src="{{$post->author->avatar}}" width="45" alt="avatar">
        <h5 class="font-medium">{{$post->author->name}}</h5>
        <h5 class="ml-5 text-xs text-gray-500 pt-1">{{$post->created_at->format('d F Y')}}</h5>
        @if(auth()->user()->is($post->author))
        
        @include('components._deleteModal')
        
        @endif
    </div>
    <a href="{{route('post', $post->id)}}">
        <div class="mt-2">
            <h5 class="text-lg font-bold">{{$post->question}}</h5>
            @if($post->best_answer)
                <p class="font-light text-sm">{{$post->best_answer}}</p>
            @endif
            @if($post->post_photo)
            <img class="mt-5" src="{{$post->post_photo}}" alt="post_img" width="500">
            @endif
        </div>
    </a>
    
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
            <button wire:click="showComment({{$post->id}})" class="flex p-1">
                <svg width="24px" height="24px" viewBox="0 0 24 24"><g id="comment" class="icon_svg-stroke icon_svg-fill" stroke="#666" stroke-width="1.5" fill="none" fill-rule="evenodd"><path d="M12.0711496,18.8605911 C16.1739904,18.8605911 19.5,15.7577921 19.5,11.9302955 C19.5,8.102799 16.1739904,5 12.0711496,5 C7.96830883,5 4.64229922,8.102799 4.64229922,11.9302955 C4.64229922,13.221057 5.02055525,14.429401 5.67929998,15.4641215 C5.99817082,15.9649865 4.1279592,18.5219189 4.56718515,18.9310749 C5.02745574,19.3598348 7.80252458,17.6358115 8.37002246,17.9406001 C9.45969688,18.5258363 10.7235179,18.8605911 12.0711496,18.8605911 Z"></path></g></svg>
                <span>{{$post->comments_count}}</span>
            </button>
        </div>   
    </footer>

    @if($comment == $post->id)
    @livewire('comments', ['postId' => $post->id], key($post->id))
    @endif
</div>
@endforeach