@extends('layouts.admin.layouts')
<!--使用するレイアウトのファイルの宣言-->

@section('title', 'Simple Board')
<!-- layouts.blade.php内に定義している yield title に埋め込むというコード-->

@section('content')
<!--endsectionまでが、layouts.blade.phpのcontentに埋め込まれるよ〜と。-->

　　@if (session('message'))
        {{ session('message') }}
    @endif
<!--bootstrap4の導入-->



<div class="card-container">

@foreach($beers as $beer)
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $beer->name }}</h5>
        　
         <td>
             <div class="col-9">
             <div class="row">
                @if ($beer->image_url !== "")
                  <img src="{{ asset('storage/beers/'.$beer->image_url) }}" class="img-thumbnail">
                @else
                  <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                @endif
            </div>
            </div>
        </td>
        
        
      
   
         <form action="/beers/{{ $beer->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else { return false };">
            <div class="d-flex" style="height: 36.4px;">
           
            <a href="/beers/{{ $beer->id }}" class="btn btn-outline-primary">Show</a>
            <a href="/beers/{{ $beer->id }}/edit" class="btn btn-outline-primary">Edit</a>
            </div>
         　 <input type="hidden" name="_method" value="DELETE">
     　　     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     　　     <button type="submit" class="btn btn-outline-primary">Delete</button>
     　    
          
        </form>
            
        </div>    
    </div>

            
    
    
    
    
    
@endforeach
<!--beers.indexで受け取った$beerを...で展開-->
<!--各投稿への一覧ページ作成が終わり-->
</div>

 
   

<a href ="/beers/create">new</a>

@endsection