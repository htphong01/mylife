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

// auth
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
Route::get('logout', 'App\Http\Controllers\Api\AuthController@logout')->middleware('jwtAuth');

// user
Route::put('save-user-infor', 'App\Http\Controllers\Api\UserController@saveUserInfor')->middleware('jwtAuth');
Route::get('search/user', 'App\Http\Controllers\Api\UserController@search');
Route::get('get/user', 'App\Http\Controllers\Api\UserController@getUser');
Route::put('user', 'App\Http\Controllers\Api\UserController@update')->middleware('jwtAuth');


//posts
Route::post('post', 'App\Http\Controllers\Api\PostsController@store')->middleware('jwtAuth');
Route::delete('posts/{id}', 'App\Http\Controllers\Api\PostsController@destroy')->middleware('jwtAuth');
Route::put('posts/{id}', 'App\Http\Controllers\Api\PostsController@update')->middleware('jwtAuth');
Route::get('posts', 'App\Http\Controllers\Api\PostsController@index');
Route::get('posts/{id}', 'App\Http\Controllers\Api\PostsController@show');



//comments
Route::post('comments', 'App\Http\Controllers\Api\CommentsController@store')->middleware('jwtAuth');
Route::delete('comments/{id}', 'App\Http\Controllers\Api\CommentsController@destroy')->middleware('jwtAuth');
Route::put('comments/{id}', 'App\Http\Controllers\Api\CommentsController@update')->middleware('jwtAuth');
Route::get('comments', 'App\Http\Controllers\Api\CommentsController@index')->middleware('jwtAuth');
Route::get('comments/post', 'App\Http\Controllers\Api\CommentsController@commentPost')->middleware('jwtAuth');
Route::get('comments/{id}', 'App\Http\Controllers\Api\CommentsController@show')->middleware('jwtAuth');

//post/likes
Route::post('likes', 'App\Http\Controllers\Api\LikesController@store')->middleware('jwtAuth');
Route::delete('likes/{id}', 'App\Http\Controllers\Api\LikesController@destroy')->middleware('jwtAuth');
Route::put('likes/{id}', 'App\Http\Controllers\Api\LikesController@update')->middleware('jwtAuth');
Route::get('likes', 'App\Http\Controllers\Api\LikesController@index')->middleware('jwtAuth');
Route::get('likes/{id}', 'App\Http\Controllers\Api\LikesController@show')->middleware('jwtAuth');

//Friend
Route::get('friends', 'App\Http\Controllers\Api\FriendController@index')->middleware('jwtAuth');
Route::get('friends/{id}', 'App\Http\Controllers\Api\FriendController@show')->middleware('jwtAuth');
Route::post('friends', 'App\Http\Controllers\Api\FriendController@store')->middleware('jwtAuth');
Route::delete('friends/{id}', 'App\Http\Controllers\Api\FriendController@destroy')->middleware('jwtAuth');
Route::put('friends/{id}', 'App\Http\Controllers\Api\FriendController@update')->middleware('jwtAuth');

//messages
Route::get('messages', 'App\Http\Controllers\Api\MessageController@index')->middleware('jwtAuth');
Route::get('messages/{room_id}', 'App\Http\Controllers\Api\MessageController@show')->middleware('jwtAuth');
Route::post('messages', 'App\Http\Controllers\Api\MessageController@store')->middleware('jwtAuth');
Route::delete('messages/{id}', 'App\Http\Controllers\Api\MessageController@destroy')->middleware('jwtAuth');
Route::put('messages/{id}', 'App\Http\Controllers\Api\MessageController@update')->middleware('jwtAuth');

//messages
Route::get('notifications', 'App\Http\Controllers\Api\NotificationController@index')->middleware('jwtAuth');
Route::get('notifications/user', 'App\Http\Controllers\Api\NotificationController@showUser')->middleware('jwtAuth');
Route::get('notifications/{id}', 'App\Http\Controllers\Api\NotificationController@show')->middleware('jwtAuth');
Route::delete('notifications/{id}', 'App\Http\Controllers\Api\NotificationController@destroy')->middleware('jwtAuth');





