@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<form method="POST" action="/beers">
    <!--actionの/beersはAWSプレビューのアドレスの後ろにつけるやつ-->
    {{ csrf_field() }}
    <!--データ保護、getやpostの通信設定の際は必ず入れたほうが良さそう-->
    <input type="text" name="title">
    <input type="text" name="content">
    <input type="submit">
</form>

@endsection