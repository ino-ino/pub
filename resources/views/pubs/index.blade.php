@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

    @if (session('message'))
        {{ session('message') }}
    @endif

<h1>Pubs</h1>

@foreach($pubs as $pub)
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pub->title }}</h5>
            <p class="card-text">{{ $pub->content }}</p>

            <div class="d-flex" style="height: 36.4px;">
    
                <a href="/pubs/{{ $pub->id }}" class="btn btn-outline-primary">Show</a>
                <a href="/pubs/{{ $pub->id }}/edit" class="btn btn-outline-primary">Edit</a>
    
                <form action="/pubs/{{ $pub->id }}" method="PUB" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    
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