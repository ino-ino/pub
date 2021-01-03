<h1>Beeeeeeeeer!</h1>

@foreach($beers as $beer)
    <a href="/beers/{{ $beer->id }}">{{ $beer->name }}</a>
    <a href="/beers/{{ $beer->id }}/edit">Edit</a>
    <!--/beers/:id/editへのリンク-->
@endforeach
<!--beers.indexで受け取った$beerを@foreachで展開-->
<!--各投稿への一覧ページ作成が終わり-->


<a href ="/beers/create">new</a>