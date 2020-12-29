@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1>Editing Beer</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="BEER" action="/beers/{{ $beer->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" aria-describedby="emailhelp" name="title" value="{{  old("title") == '' ? $beer->title : old("title") }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea class="form-control" name="content">{{ old("content") == '' ? $beer->title : old("title") }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>

<a href="/beers/{{ $beer->id }}">Show</a> | 
<a href="/beers">Back</a>    

@endsection