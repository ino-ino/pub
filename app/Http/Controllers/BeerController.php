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
        // 作成されてるすべての投稿を取得
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
        return view("beers.create");
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
        $beer->name = $request->input('title');
        $beer->memo = $request->input('content');
        // titleとcontentはどこからのデータだっけ...
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
    // 閲覧ページ
    
    {
        
        return view('beers.show',compact('beer') );
        // compact('beer')でビューに変数を渡す
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        return view("beers.edit",compact("beer"));
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
        $beer->name = $request->input("title");
        $beer->memo = $request->input("content");
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
