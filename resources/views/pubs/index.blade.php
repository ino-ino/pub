@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

    @if (session('message'))
        {{ session('message') }}
    @endif

<h1>Pubs</h1>

@foreach($pubs as $pub)
    <a href="/pubs/{{ $pub->id }}">{{ $pub->title }}</a>
    <a href="/pubs/{{ $pub->id }}/edit">Edit</a>
    
     <form action="/pubs/{{ $pub->id }}" method="PUB" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Delete</button>
    </form>
@endforeach

<a href="/pubs/create">New Pub</a> 

@endsection