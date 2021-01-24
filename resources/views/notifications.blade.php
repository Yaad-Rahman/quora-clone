@extends('layouts.master')

@section('content')

<div class="mx-auto max-w-lg mt-10 shadow">
@foreach ($notifications as $notification)
    @if ($notification->data['message'] == 'Started following you')
        <div class="{{$notification->unread() ? 'bg-gray-400' : null}} p-5 border hover:bg-red-100 hover:text-red-900">
            <p>
                <a class="font-bold underline" href="{{$notification->data['action']}}">{{$notification->data['name']}}</a>
                {{$notification->data['message']}}
            </p>
            <p class="text-xs font-light">{{$notification->created_at->format('d F Y')}}</p>
        </div>
        
    @endif

        <div class="{{$notification->unread() ? 'bg-gray-400' : null}} p-5 border hover:bg-red-100 hover:text-red-900">
            <p>
                <a class="font-bold underline" href="{{$notification->data['action']}}">{{$notification->data['name']}}</a>
                {{$notification->data['message']}} <a class="font-bold underline" href="{{$notification->data['action']}}">{{Str::limit($notification->data['postName'], 30, '...')}}</a>
            </p>
            <p class="text-xs font-light">{{$notification->created_at->format('d F Y')}}</p>
        </div>
        

@endforeach
</div>
    
@endsection
