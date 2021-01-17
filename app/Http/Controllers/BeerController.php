<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    public function index()
    {
        
        
        $beers = Beer::all();
        // echo "<pre>";
        // print_r($beers);
        // echo "</pre>";
        // exit(1);
        // 作成されてるすべての投稿をBeerモデルに取得
        
        
        return view("beers.index",compact('beers'));
    
    }
    // 画面表示

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sharpness = Beer::$sharpness;
        
        $body = Beer::$body;
        $aroma = Beer::$aroma;
        $flavor = Beer::$flavor;
        $throat = Beer::$throat;
        
        
        return view("beers.create",compact('sharpness','body','aroma','flavor','throat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // 新規投稿ページ
    
    {
        $beer = new Beer();
        // Beerモデルの中身をここに記載？
        $beer->name = $request->input('name');
        $beer->memo = $request->input('memo');
        $beer->manufacturer = $request->input('manufacturer');  //必須条件にしてないからこの文は消してもエラーにならない笑
        $beer->image_url = $request->input('image_url');
        // titleとcontentはブラウザからcloud9にデータを渡す為の名前。ブラウザから受け取ったtitle,contentはcloud9で今回はname,memoに変換されている
        // ややこしいので、ブラウザから受け取る名前とcloud9からLaravelへ渡す名前を一致させてあげる。
        // 構造的に二段階。ブラウザ->cloud9(今回)->Laravel(フレームワーク)んで、Laravelはmvcモデルなのでモデルで受け取り、テンプレートで表示、コントローラーで指示、かな
        
        $beer->sharpness = $request->input('sharpness');
        $beer->save();
        
        return redirect()->route('beers.show',['id' => $beer->id])->with('message', 'Beer was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beer)
    // editで作ったものを閲覧できるページ
    
    {
        //   echo "<pre>";
        //   print_r($beer);exit(1);
        // sharpnessの値が来ていない。
        
        return view('beers.show',compact ('beer','sharpness','sharpnessChecked'));
        // compact('beer')でビューに変数を渡す
        // compact:
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    // 投稿を作る場所、sharpnessの値を選んだものをshowに送りたい
    {
        
        // echo "<pre>";
        // print_r($beers);
        // echo "</pre>";
        // exit(1);
        $sharpness = Beer::$sharpness;
        
        $body = Beer::$body;
        $aroma = Beer::$aroma;
        $flavor = Beer::$flavor;
        $throat = Beer::$throat;
       
    
        // Beerモデルの中のsharpnesssの値を、コントローラーのeditの$optionsに渡している。
        // array()が省略されているだけ。これが連想配列。sharpnessに紐つけてあるのがBeerモデルの$sharpnessの値
        
        
        return view("beers.edit",compact('beer','sharpness','body','aroma','flavor','throat'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beer)
    {
        $beer->name = $request->input("name");
        $beer->memo = $request->input("memo");
        $beer->manufacturer = $request->input('manufacturer');
        $beer->image_url = $request->input('image_url');
        $beer->save();
        
        return redirect()->route("beers.show",['id' => $beer->id])->with('message', 'Beer was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();
        
        return redirect()->route("beers.index");
    }
}
