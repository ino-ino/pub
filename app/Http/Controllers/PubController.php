<?php

namespace App\Http\Controllers;

use App\Pub;
use Illuminate\Http\Request;

class PubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pubs = Pub::all();
        return view('pubs.index',compact('pubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pub = new Pub();
        $pub->title = $request->input('title');
        $pub->content = $request->input('content');
        $pub->save();
        
        return redirect()->route('pubs.show', ['id' => $pub->id])->with('message', 'Pub was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function show(Pub $pub)
    {
        return view('pubs.show', compact('pub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function edit(Pub $pub)
    {
        return view('pubs.edit', compact('pub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pub $pub)
    {
        $pub->title = $request->input('title');
        $pub->content = $request->input('content');
        $pub->save();

        return redirect()->route('pubs.show', ['id' => $pub->id])->with('message', 'Pub was successfully updated.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pub $pub)
    {
        $pub->delete();

        return redirect()->route('pubs.index');
    }
}
