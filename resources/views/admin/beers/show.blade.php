<!--Admin-->

@extends('layouts.admin.layouts')

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
    
               <!--sharpnessの値は来ているけど？-->
            <p class="card-text">キレ{{ $beer->sharpness }} </p>
                <!--こちら側が$beer->sharpnessだからだ-->
            <p class="card-text">コク{{ $beer->body }}</p>
            <p class="card-text">香り{{ $beer->aroma }}</p>
            <p class='card-text'>味わい{{ $beer->flavor }}</p>
            <p class='card-text'>のどごし{{ $beer->throat }}</p>
                <!--ラジオボタンの意味が無い。-->
           
        </div>

　</div>
            

        <div class="d-flex" style="height: 36.4px;">
            <!--ボタンレイアウトはbootstrap4のflexというユーティリティらしい。※ユーティリティ？-->
            <a href="/beers/{{ $beer->id }}/edit" class="btn btn-outline-primary">Edit</a>
             <!--/beers/:id/editとshowへのリンク btn-outline-primaryでボタンの色が変わるというおしゃれなセレクター-->
        </div>
    
<!--新しい投稿をするとshowアクションが呼び出しされる。作成した内容が表示される-->


<a href="/beers">Back</a>
<!--各投稿の閲覧ページからも編集画面へ移動できるよう-->

@endsection