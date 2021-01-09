@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1>Editing Post</h1>

<form method="POST" action="/beers/{{ $beer->id }}">
    <!--アクションされるのは/beers/の$beer->id-->
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <!--送信方法-->
    <div class="form-group">
        <label for="exampleInputEmail1">ビールの名前</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="name" value="{{ $beer->name }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">豆知識</label>
        <textarea class="form-control" name="memo">{{ $beer->memo }}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">製造元</label>
        <textarea class="form-control" name="manufacturer">{{ $beer->manufacturer }}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">画像URL</label>
        <textarea class="form-control" name="image_url">{{ $beer->image_url }}</textarea>
    </div>
    <input type="submit" class="btn btn-outline-primary">
</form>

<a href="/beers/{{ $beer->id }}">Show</a>
<a href="/beers">Back</a>


@endsection