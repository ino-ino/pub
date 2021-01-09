@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

@if (session('massage'))
    {{ session('message') }}
@endif
 <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $beer->name }}</h5>
            <p class="card-text">{{ $beer->memo }}</p>
            <p class="card-text">{{ $beer->manufacturer }}</p>
            <p class="card-text">{{ $beer->image_url }}</p>
            
        <div class="d-flex" style="height: 36.4px;">
            <!--ボタンレイアウトはbootstrap4のflexというユーティリティらしい。※ユーティリティ？-->
            <a href="/beers/{{ $beer->id }}/edit" class="btn btn-outline-primary">Edit</a>
             <!--/beers/:id/editとshowへのリンク btn-outline-primaryでボタンの色が変わるというおしゃれなセレクター-->
        </div>
        </div>
    </div>
<!--新しい投稿をするとshowアクションが呼び出しされる。作成した内容が表示される-->


<a href="/beers">Back</a>
<!--各投稿の閲覧ページからも編集画面へ移動できるよう-->

@endsection