<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// pub
Route::resource('pubs', 'PubController');

    if (env('APP_ENV') === 'local') {
        URL::forceScheme('https');
 } 

Route::get('/', 'PubController@index');

Route::resource('pubs', 'PubController');

if (env('APP_ENV') === 'local') { 
    URL::forceScheme('https');
}




// beer
Route::resource('beers', 'BeerController');

    if (env('APP_ENV') === 'local') {
        URL::forceScheme('https');
 } 

Route::get('/', 'BeerController@index');

Route::resource('beers', 'BeerController');
// これ２個あるけど消していいのか？

if (env('APP_ENV') === 'local') { 
    URL::forceScheme('https');
}
