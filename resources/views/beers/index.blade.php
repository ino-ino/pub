@extends('layouts.layouts')
<!--使用するレイアウトのファイルの宣言-->

@section('title', 'Simple Board')
<!-- layouts.blade.php内に定義している yield title に埋め込むというコード-->

@section('content')
<!--endsectionまでが、layouts.blade.phpのcontentに埋め込まれるよ〜と。-->

　　@if (session('message'))
        {{ session('message') }}
    @endif
<!--bootstrap4の導入-->

<h1>Beeeeeeeeer!</h1>

@foreach($beers as $beer)

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $beer->name }}</h5>
            <p class="card-text">{{ $beer->memo }}</p>
            <p class="card-text">{{ $beer->manufacturer }}</p>
            <p class="card-text">{{ $beer->image_url }}</p>
            
        <div class="d-flex" style="height: 36.4px;">
            <!--ボタンレイアウトはbootstrap4のflexというユーティリティらしい。※ユーティリティ？-->
            <a href="/beers/{{ $beer->id }}" class="btn btn-outline-primary">Show</a>
            <a href="/beers/{{ $beer->id }}/edit" class="btn btn-outline-primary">Edit</a>
             <!--/beers/:id/editとshowへのリンク btn-outline-primaryでボタンの色が変わるというおしゃれなセレクター-->
        </div>
        </div>
    </div>
    <!--/beers/:id/editへのリンク-->
    
    <form action="/beers/{{ $beer->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else { return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-outline-primary">Delete</button>
        <!--ここにもボタンが変わるセレクター入れました、と。-->
    </form>
    <!--formタグ使ってBeerContollerのdestroyアクションへDELETEリクエストを送る。疑問、なぜこれでコントローラーにDELETEリクエストが送られるのか？-->
    <!-- indexだから？-->
    
@endforeach
<!--beers.indexで受け取った$beerを...で展開-->
<!--各投稿への一覧ページ作成が終わり-->




<a href ="/beers/create" class="btn btn-outline-primary">new</a>

@endsection