@extends('layouts.master')

@section('content')
    <div class="mx-auto max-w-lg mt-10 shadow">
        @foreach ($activities as $activity)

            @if($activity->activitable_type == 'App\\Post')
            <div class="py-5 border-b px-4">
                <p>{{$activity->name}} <a class="font-bold underline" href="{{route('post', $activity->activitable_id)}}">{{Str::limit($activity->activitable->question, 50, '...')}}</a></p>
                <p class="text-xs font-light">{{$activity->created_at->format('d F Y')}}</p>
            </div>
            @endif

            @if($activity->activitable_type == 'App\\User')
            <div class="py-5 border-b px-4">
                <p>{{$activity->name}} <a class="font-bold underline" href="{{route('profile', $activity->activitable->name)}}">{{$activity->activitable->name}}</a></p>
                <p class="text-xs font-light">{{$activity->created_at->format('d F Y')}}</p>
            </div>
            @endif

            @if($activity->activitable_type == 'App\\Comment')
            <div class="py-5 border-b px-4">
                <p>{{$activity->name}} <a class="font-bold underline" href="{{route('post', $activity->activitable->post_id)}}">{{Str::limit($activity->activitable->comment, 50, '...')}}</a></p>
                <p class="text-xs font-light">{{$activity->created_at->format('d F Y')}}</p>
            </div>
                
            @endif
            @endforeach

            {{$activities->links('components._pagination')}}
    </div>

    
@endsection