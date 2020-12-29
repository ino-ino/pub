@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

    @if (session('message'))
        {{ session('message') }}
    @endif

<h1>Beers</h1>

@foreach($beers as $beer)
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $beer->title }}</h5>
            <p class="card-text">{{ $beer->content }}</p>

            <div class="d-flex" style="height: 36.4px;">
    
                <a href="/beers/{{ $beer->id }}" class="btn btn-outline-primary">Show</a>
                <a href="/beers/{{ $beer->id }}/edit" class="btn btn-outline-primary">Edit</a>
    
                <form action="/beers/{{ $beer->id }}" method="BEER" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    
      <a href="/beers/{{ $beer->id }}">{{ $beer->title }}</a>
        <a href="/beers/{{ $beer->id }}/edit">Edit</a>
        
        <form action="/beers/{{ $beer->id }}" method="BEER" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Delete</button>
    </form>
    
@endforeach

<a href="/beers/create">New Beer</a> 

@endsection