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

if (env('APP_ENV') === 'local') {
    URL::forceScheme('https');
} 


// pub
Route::resource('pubs', 'PubController');




// beer
Route::resource('beers', 'BeerController');

Route::get('/', 'BeerController@index');
// 一番下のとこが適応される。もし/postに初期設定したいなら、BeerController@indexをPostControllerに変更する、と。

Route::resource('admin/beers', 'Admin\BeerController');
Route::get('/', 'Admin\BeerController@index');