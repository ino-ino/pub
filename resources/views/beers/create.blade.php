@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<form method="POST" action="/beers">
    <!--actionの/beersはAWSプレビューのアドレスの後ろにつけるやつ-->
    {{ csrf_field() }}
    <!--データ保護、getやpostの通信設定の際は必ず入れたほうが良さそう-->
    <input type="text" name="name">
    <input type="text" name="memo">
    <input type="text" name="manufacturer">
    <input type="url" name="image_url">
    <input type="submit">
</form>

@endsection