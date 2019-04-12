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
    return redirect('/threads');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/threads', function() {
    return view("threads");
})->name('threads');

Route::get('/test/{thread_id}', "ThreadController@view_thread");
