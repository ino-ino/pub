@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<form method="PUB" action="/pubs/{{ $pub->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value="{{ $pub->title }}">
        <input type="text" name="content" value="{{ $pub->content }}">
        <input type="submit">
    </form> 

@endsection