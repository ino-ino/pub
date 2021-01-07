<h1>Beeeeeeeeer!</h1>

@foreach($beers as $beer)
    <a href="/beers/{{ $beer->id }}">{{ $beer->name }}</a>
    <a href="/beers/{{ $beer->id }}/edit">Edit</a>
    <!--/beers/:id/editへのリンク-->
    
    <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Delete</button>
    </form>
    <!--formタグ使ってBeerContollerのdestroyアクションへDELETEリクエストを送る。疑問、なぜこれでコントローラーにDELETEリクエストが送られるのか？-->
    <!-- indexだから？-->
    
@endforeach
<!--beers.indexで受け取った$beerを...で展開-->
<!--各投稿への一覧ページ作成が終わり-->




<a href ="/beers/create">new</a>