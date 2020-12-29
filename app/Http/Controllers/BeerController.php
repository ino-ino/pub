<?php

namespace App\Http\Controllers;

use App\beer;
use Illuminate\Http\Request;

class beerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::all();
        return view('beers.index',compact("beers"));
    }

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
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            // 多分変更場所
         ]);
         
        $beer = new Beer();
        $beer->title = $request->input('title');
        $beer->content = $request->input('content');
        $beer->save();
        // 多分変更場所
        return redirect()->route('beers.show', ['id' => $beer->id])->with('message', 'Beer was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function show(beer $beer)
    {
        return view("beers.show", compact("beer"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(beer $beer)
    {
        return view("beers.edit", compact("beer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, beer $beer)
    {
        $request->validate([
                "title"=>"required",
                "content"=>"required",
            // 多分変更場所
            ]);
            
        $beer->title = $request->input('title');
        $beer->content = $request->input('content');
        $beer->save();

        return redirect()->route('beers.show', ['id' => $beer->id])->with('message', 'Beer was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function destroy(beer $beer)
    // 最初のbeerの頭文字が小文字！どう直せば？
    {
        $beer->delete();

        return redirect()->route('beers.index');
    }
}
