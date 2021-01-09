@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<form method="POST" action="/beers/{{ $beer->id }}">
    <!--アクションされるのは/beers/の$beer->id-->
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <!--送信方法-->
    <input type="text" name="name" value="{{ $beer->name }}">
    <!--タイトルの入力方法がtext,送信される場所？が$beer->nameかな？-->
    <input type="text" name="memo" value="{{ $beer->memo }}">
    <input type="text" name="manufacturer" value="{{ $beer->manufacturer }}">
    <input type="url" name="image_url" value="{{ $beer->image_url }}"
    <input type="submit">
</form>

@endsection