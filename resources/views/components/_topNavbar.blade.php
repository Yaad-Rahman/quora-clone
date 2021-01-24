<div class="flex justify-evenly border shadow py-5">
    <h4 class="text-2xl text-red-500">Quora</h4>
    <a class="{{(Request::is('home')) ? 'text-red-600 border-b-2 border-red-500' : null}}" 
    href="{{route('home')}}">Home</a>
    <h6>Following</h6>
    <h6>Answer</h6>
    <a class="{{(Request::is('notifications')) ? 'text-red-600 border-b-2 border-red-500' : null}}" 
    href="{{route('notifications')}}">Notifications <span class="bg-red-500 px-1 rounded-full text-white text-sm">{{auth()->user()->unreadNotifications->count()}}</span></a>
    @livewire('search')
    @include('components._profileMenu')  
    <h6 class="bg-red-500 p-1 text-white rounded-3xl">Add Question</h6>
</div>