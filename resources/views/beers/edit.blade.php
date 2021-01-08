@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<form method="POST" action="/beers/{{ $beer->id }}">
    <!--アクションされるのは/beers/の$beer->id-->
    {{ csrf_field() }}
    <input type="hidden" name="method" value="PUT">
    <!--送信方法-->
    <input type="text" name="title" value="{{ $beer->name }}">
    <!--タイトルの入力方法がtext,送信される場所？が$beer->nameかな？-->
    <input type="text" name="content" value="{{ $beer->memo }}">
    <input type="submit">
</form>

@endsection