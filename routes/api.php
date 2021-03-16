<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;

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

// user
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
Route::get('logout', 'App\Http\Controllers\Api\AuthController@logout');
Route::post('save-user-infor', 'App\Http\Controllers\Api\AuthController@saveUserInfor')->middleware('jwtAuth');

//posts
Route::post('posts', 'App\Http\Controllers\Api\PostsController@store')->middleware('jwtAuth');
Route::delete('posts/{id}', 'App\Http\Controllers\Api\PostsController@destroy')->middleware('jwtAuth');
Route::put('posts/{id}', 'App\Http\Controllers\Api\PostsController@update')->middleware('jwtAuth');
Route::get('posts', 'App\Http\Controllers\Api\PostsController@posts');

//comments
Route::post('comments', 'App\Http\Controllers\Api\CommentsController@store')->middleware('jwtAuth');
Route::delete('comments/{id}', 'App\Http\Controllers\Api\CommentsController@destroy')->middleware('jwtAuth');
Route::put('comments/{id}', 'App\Http\Controllers\Api\CommentsController@update')->middleware('jwtAuth');
Route::get('comments', 'App\Http\Controllers\Api\CommentsController@index')->middleware('jwtAuth');
Route::get('comments/{id}', 'App\Http\Controllers\Api\CommentsController@show')->middleware('jwtAuth');

//post/likes
Route::post('likes', 'App\Http\Controllers\Api\LikesController@store')->middleware('jwtAuth');
Route::delete('likes/{id}', 'App\Http\Controllers\Api\LikesController@destroy')->middleware('jwtAuth');
Route::put('likes/{id}', 'App\Http\Controllers\Api\LikesController@update')->middleware('jwtAuth');
Route::get('likes', 'App\Http\Controllers\Api\LikesController@index')->middleware('jwtAuth');
Route::get('likes/{id}', 'App\Http\Controllers\Api\LikesController@show')->middleware('jwtAuth');


