<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**-
 * Thread routes
 */
$thread_prefix = "thread";

//Gets
Route::get('threads', 'ThreadController@index');
Route::get($thread_prefix . '/{id}', 'ThreadController@show');
Route::get($thread_prefix  . '/destroy/{id}', 'ThreadController@destroy');

//Posts
Route::post($thread_prefix . '/update/{thread}', 'ThreadController@update');
Route::post($thread_prefix . '/store', 'ThreadController@store');

/**
 * Post routes
 */
$post_prefix = "post";
//Gets
Route::get($post_prefix . '/thread/{thread_id}', 'PostController@show');
Route::get($post_prefix  . '/destroy/{id}', 'PostController@destroy');

//Posts
Route::post($post_prefix . '/update/{post}', 'PostController@update');
Route::post($post_prefix . '/store', 'PostController@store');

 /**
  * Tag routes
  */
$tag_prefix = "tag";
Route::get('tags', 'TagController@index');
Route::get($tag_prefix . '/{id}', 'TagController@show');

//Posts
Route::post($tag_prefix . '/update/{tag}', 'TagController@update');
Route::post($tag_prefix . '/store', 'TagController@store');
Route::post($tag_prefix  . '/destroy/{tag}', 'TagController@destroy');
