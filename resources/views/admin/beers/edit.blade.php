<!--Admin-->

@extends('layouts.admin.layouts')

@section('title', 'Simple Board')

@section('content')

<h1>Editing Post</h1>

<style background="none"></style>

<form method="POST" action="/beers/{{ $beer->id }}" enctype="multipart/form-data">
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
    
    <div class="form-inline mt-4 mb-4 row">
        <label class="col-2 d-flex justify-content-start">画像</label>
        @if ($beer->image_url !== null)
            <img src="{{ asset('storage/beers/'.$beer->image_url) }}" id="product-image-preview" class="img-fluid w-25">
        @else
            <img src="" id="product-image-preview">
        @endif
        <div class="d-flex flex-column ml-2">
            <small class="mb-3">600px×600px推奨。<br>商品の魅力が伝わる画像をアップロードして下さい。</small>
            <label for="product-image" class="btn samazon-submit-button">画像を選択</label>
            <input type="file" name="image_url" id="product-image" onChange="handleImage(this.files)" style="display: none;">
        </div>
    </div>
         
     <script type="text/javascript">

        function handleImage(image) {
            let reader = new FileReader();
            reader.onload = function() {
                let imagePreview = document.getElementById("product-image-preview");
                imagePreview.src = reader.result;
            }
            console.log(image);
            reader.readAsDataURL(image[0]);
        }
　　 </script>

      <div class="form-group">
   　　　<h6>キレ</h6>
      @foreach($sharpness as $v)
        <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="sharpness" value="{{ $v }}"
         @if( $v == $beer->sharpness )  checked="checked"  @endif>
         <!--editとshowの値が等しければチェックだから、editの値が$beer->sharpnessだからだ-->
        </div>      
      @endforeach
      </div>
  
      <div class="form-group">  
  　　　　<h6>コク</h6>
      @foreach($body as $v)
       <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="body" value="{{ $v }}"
         @if( $v == $beer->body )  checked="checked"  @endif>
       </div>      
      @endforeach
      </div>
      
      <div class="form-group">  
  　　　　<h6>香り</h6>
      @foreach($aroma as $v)
       <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="aroma" value="{{ $v }}"
         @if( $v == $beer->aroma )  checked="checked"  @endif>
       </div>      
      @endforeach
      </div>
      
       
      <div class="form-group">  
        <h6>味わい</h6>
      @foreach($flavor as $v)
       <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="flavor" value="{{ $v }}"
         @if( $v == $beer->flavor )  checked="checked"  @endif>
       </div>      
      @endforeach
      </div>
      
       
      <div class="form-group">  
        <h6>のどごし</h6>
      @foreach($throat as $v)
       <div class="form-check form-check-inline">
          <label>{{ $v }}
          <input class="form-check-input" type="radio" name="throat" value="{{ $v }}"
         @if( $v == $beer->throat )  checked="checked"  @endif>
       </div>      
      @endforeach
      </div>
      


　　　<input type="submit" class="btn btn-outline-primary">
</form>

<a href="/beers/{{ $beer->id }}">Show</a>
<a href="/beers">Back</a>




@endsection