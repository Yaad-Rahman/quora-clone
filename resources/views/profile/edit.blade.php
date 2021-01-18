@extends('layouts.master')

@section('content')

@if (auth()->user()->is($user))
 @livewire('profile-edit')
 
 @else 
 <h1 class="text-center p-20 text-2xl text-red-500 font-bold">Access Denied!!</h1>
@endif

@endsection