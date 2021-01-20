@extends('layouts.master')

@section('content')
    @livewire('single-post', ['postId' => $postId], key($postId))


@endsection