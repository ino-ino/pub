@if (session('massage'))
    {{ session('message') }}
@endif

{{ $beer->name }}
{{ $beer->memo }} 
<!--新しい投稿をするとshowアクションが呼び出しされる。作成した内容が表示される-->

<a href="/beers/{{ $beer->id }}/edit">Edit</a>
<!--各投稿の閲覧ページからも編集画面へ移動できるよう-->