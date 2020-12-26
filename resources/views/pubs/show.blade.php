
@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

 @if (session('message'))
        {{ session('message') }}
    @endif

    {{ $pub->title }}
    {{ $pub->content }} 

 <a href="/pubs/{{ $pub->id }}/edit">Edit</a>
 
@endsection