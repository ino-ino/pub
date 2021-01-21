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


<div class="form-group row">
   <label for="radio01" class="col-md-4 col-form-label text-md-right">キレ</label>
   <div class="col-md-6">
       
       @foreach($sharpness as $v)
      <div class="form-check form-check-inline">
         <label>{{ $v }}
         <input class="form-check-input" type="radio" name="sharpness" value="{{ $v }}">
        </div>      
      @endforeach
     
  </div>
  
<div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">コク</label>
  <div class="col-md-8">
      
      @foreach($body as $body)
       <div class="form-check form-check-inline">
         <label>{{ $body }}
         <input class="form-check-input" type="radio" name="body" value="{{$body}}">
        </div>      
      @endforeach
      
      <div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">香り</label>
  <div class="col-md-8">
      
      @foreach($aroma as $aroma)
       <div class="form-check form-check-inline">
         <label>{{ $aroma }}
         <input class="form-check-input" type="radio" name="aroma" value="{{$aroma}}">
        </div>      
      @endforeach
      
       
      <div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">味わい</label>
  <div class="col-md-8">
      
      @foreach($flavor as $flavor)
       <div class="form-check form-check-inline">
         <label>{{ $flavor }}
         <input class="form-check-input" type="radio" name="flavor" value="{{$flavor}}">
        </div>      
      @endforeach
      
       
      <div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">のどごし</label>
  <div class="col-md-8">
      
      @foreach($throat as $throat)
       <div class="form-check form-check-inline">
         <label>{{ $throat }}
         <input class="form-check-input" type="radio" name="throat" value="{{$throat}}">
        </div>      
      @endforeach
</div>
    
     
　　<!--ただ選択できるだけ？データをコントローラーに渡さないといけないはず-->
    <button type="submit" class="btn btn-outline-primary">送信</button>
</form>


@endsection