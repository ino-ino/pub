<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// asset()を使ってビューで商品画像を表示できるようになっている

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    public function index(Request $request)
    {
        
        $name = $request->input('keyword');
         
        if(!empty($name))
        {
            $beers = Beer::where('name','like','%'.$name.'%')
                            ->orWhere('manufacturer','like',"%{$name}%")
                            ->orWhere('memo','like','%'.$name.'%')
                            ->get();
        }else{
            
            $beers = Beer::all();
        }
        
       
        return view("beers.index",compact('beers','memo','name','keyword'));
  
    }

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
       
        
        return view("beers.create",compact('beer','sharpness','body','aroma','flavor','throat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // 新規作成のデータ管理場所
    
    {
        $beer = new Beer();
        // beerインスタンスを作成している
        $beer->name = $request->input('name');
        $beer->memo = $request->input('memo');
        $beer->manufacturer = $request->input('manufacturer');  //必須条件にしてないからこの文は消してもエラーにならない
        $beer->image_url = $request->input('image_url');
        // ややこしいので、ブラウザから受け取る名前とcloud9からLaravelへ渡す名前を一致させてあげる。
        // 構造的に二段階。ブラウザ->cloud9(今回)->Laravel(フレームワーク)んで、Laravelはmvcモデル、テンプレートで表示、コントローラーで指示している
        
        $beer->sharpness = $request->input('sharpness');
        $beer->body = $request->input('body');
        $beer->aroma = $request->input('aroma');
        $beer->flavor = $request->input('flavor');
        $beer->throat = $request->input('throat');
        
        if ($request->file('image_url') !== null) {
            $image_url = $request->file('image_url')-> store('beers');
            $beer->image_url = basename($image_url);
            // tureの場合、
        } else {
            $beer->image_url = '';
            // falseの場合
        }
        
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
        $beer->sharpness;
        //   echo "<pre>";
        //   print_r($beer);exit(1);
        // sharpnessの値が来ていない。
        $sharpness = Beer::$sharpness;
        $body = Beer::$body;
        $aroma = Beer::$aroma;
        $flavor = Beer::$flavor;
        $throat = Beer::$throat;
    
        
        return view('beers.show',compact ('beer','sharpness','body','aroma','flavor','throat'));
        // compact()でビューに変数を渡す
        // 
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
        
        $beer->sharpness = $request->input('sharpness');
        $beer->body = $request->input('body');
        $beer->aroma = $request->input('aroma');
        $beer->flavor = $request->input('flavor');
        $beer->throat = $request->input('throat');
        
        if ($request->hasFile('image_url')) {
            $image_url = $request->file('image_url')->store('public/beers');
            $beer->image_url = basename($image_url);
        }
        
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
