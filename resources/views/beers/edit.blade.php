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

          
<div class="form-group row">
   <label for="radio01" class="col-md-4 col-form-label text-md-right">キレ</label>
   <div class="col-md-6">
       
      @foreach($sharpness as $sharpness)
      <div class="form-check form-check-inline">
         <label>{{ $sharpness }}
         <input class="form-check-input" type="radio" name="sharpness" value="{{$sharpness }}"
         @if( $sharpness === 4 )  checked="checked";  @endif>
        </div>      
      @endforeach
     
  </div>
  
<div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">コク</label>
  <div class="col-md-8">
      
      @foreach($body as $body)
       <div class="form-check form-check-inline">
         <label>{{ $body }}
         <input class="form-check-input" type="radio" name="body" value="{{$body}}"
         @if( $body === 2 )  checked="checked";  @endif>
        </div>      
      @endforeach
      
      <div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">香り</label>
  <div class="col-md-8">
      
      @foreach($aroma as $aroma)
       <div class="form-check form-check-inline">
         <label>{{ $aroma }}
         <input class="form-check-input" type="radio" name="aroma" value="{{$aroma}}"
         @if( $aroma === 5 )  checked="checked";  @endif>
        </div>      
      @endforeach
      
       
      <div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">味わい</label>
  <div class="col-md-8">
      
      @foreach($flavor as $flavor)
       <div class="form-check form-check-inline">
         <label>{{ $flavor }}
         <input class="form-check-input" type="radio" name="flavor" value="{{$flavor}}"
         @if( $flavor === 3 )  checked="checked";  @endif>
        </div>      
      @endforeach
      
       
      <div class="form-group row">  
  <label for="radio01" class="col-md-4 col-form-label text-md-right">のどごし</label>
  <div class="col-md-8">
      
      @foreach($throat as $throat)
       <div class="form-check form-check-inline">
         <label>{{ $throat }}
         <input class="form-check-input" type="radio" name="throat" value="{{$throat}}"
         @if( $throat === 5 )  checked="checked";  @endif>
        </div>      
      @endforeach
</div>
   </div>
</div>


<input type="submit" class="btn btn-outline-primary">
</form>

<a href="/beers/{{ $beer->id }}">Show</a>
<a href="/beers">Back</a>


@endsection