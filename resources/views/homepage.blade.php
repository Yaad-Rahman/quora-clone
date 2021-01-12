@extends('layouts.master')

@section('content')
    <div class="mt-10 lg:flex lg:justify-center mx-10">
        <div class="lg:w-32">
           @include('components._leftSidebar')
        </div>
        <div class="lg:flex-1 lg:mx-10">
            @include('components._postPanel')
            @include('components._posts')
        </div>
       <div class="lg:w-1/6">
           @include('components._rightSidebar')
           
       </div>
    </div>
@endsection