<!--不要-->

@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')


<form method="POST" action="/beers" enctype="multipart/form-data">
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
    <div class="form-inline mt-4 mb-4 row">
      <label for="exampleInputPassword1" class="col-2 d-flex justify-content-start">画像URL</label>
      <img src="@" id="exampleInputPassword1-image-preview">
      <!--教材だと＃、コメントアウト表記になります。-->
      <input type="file" name="image_url" id="exampleInputPassword1">   
    </div>
    
    
    
　<!--おかしい場所-->
    <script type="text/javascript">
    $("#product-image").change(function() {
         if (this.files && this.files[0]) {
             let reader = new FileReader();
             reader.onload = function(e) {
                 $("product-image-preview").attr("src", e.target.result);
             }
             reader.readAsDataURL(this.files[0]);
         }
     });
    </script>
 　<!--おかしい場所-->

 



　　　<div class="form-group">
   　　　　<h6>キレ</h6>
       @foreach($sharpness as $v)
          <div class="form-check form-check-inline">
            <label>{{ $v }}
            <input class="form-check-input" type="radio" name="sharpness" value="{{ $v }}">
          </div>      
       @endforeach
  　　</div>
  
　　　<div class="form-group">  
  　　　　<h6>コク</h6>
      @foreach($body as $v)
        <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="body" value="{{ $v }}">
        </div>      
      @endforeach
      </div>
      
      <div class="form-group">  
  　　　　<h6>香り</h6>
      @foreach($aroma as $v)
        <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="aroma" value="{{ $v }}">
        </div>      
      @endforeach
      </div>
       
      <div class="form-group">  
    　　　<h6>味わい</h6>
      @foreach($flavor as $v)
        <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="flavor" value="{{ $v }}">
        </div>      
      @endforeach
      
       
      <div class="form-group">  
        <h6>のどごし</h6>
      @foreach($throat as $v)
         <div class="form-check form-check-inline">
           <label>{{ $v }}
           <input class="form-check-input" type="radio" name="throat" value="{{ $v }}">
         </div>      
      @endforeach
　　　</div>
　　　
    <button type="submit" class="btn btn-outline-primary">送信</button>
</form>


@endsection