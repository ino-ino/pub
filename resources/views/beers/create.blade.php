@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1>New Post</h1>

<form method="POST" action="/beers">
    <!--actionの/beersはAWSプレビューのアドレスの後ろにつけるやつ-->
    {{ csrf_field() }}
    <!--データ保護、getやpostの通信設定の際は必ず入れたほうが良さそう-->
     <div class="form-group">
        <label for="exampleInputEmail1">ビールの名前</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">豆知識</label>
        <textarea class="form-control" name="memo"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">製造元</label>
        <textarea class="form-control" name="manufacturer"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">画像URL</label>
        <textarea class="form-control" name="image_url"></textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">送信</button>
</form>

@endsection