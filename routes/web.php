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
    return view('fst_page');
});
//test
Route::get('test', function () {
    return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
});
Route::get('test2',"hoge807con@test2");
Route::get('koushin',"hoge807con@thread_koushin");
Route::post('texts_koushin',"hoge807con@texts_koushin");
//end_test
Route::get("main","hoge807con@get_main")->name("main");
Route::post("main","hoge807con@create_thread");
Route::get("thread/{number}","hoge807con@get_thread")->name("thread");
Route::post("thread/{number}","hoge807con@post_thread");
