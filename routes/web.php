<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', 'App\Http\Controllers\Admin\AdminController@login');
    Route::post('/verify-login', 'App\Http\Controllers\Admin\AdminController@verifyLogin');

    Route::middleware(['addToken'])->group(function () {

        Route::get('/logout', 'App\Http\Controllers\Admin\AdminController@logout');

        Route::get('/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');

        Route::get('/users', 'App\Http\Controllers\Admin\UserController@index');
        Route::get('/users/{id}', 'App\Http\Controllers\Admin\UserController@update');

        Route::get('/posts', 'App\Http\Controllers\Admin\PostController@index');
        Route::get('/posts/{id}', 'App\Http\Controllers\Admin\PostController@update');

        Route::get('/comments', 'App\Http\Controllers\Admin\CommentController@index');
        Route::get('/comments/{id}', 'App\Http\Controllers\Admin\CommentController@update');

        Route::get('/events', 'App\Http\Controllers\Admin\EventController@index');
        Route::get('/events/{id}', 'App\Http\Controllers\Admin\EventController@update');

        Route::get('/reports', 'App\Http\Controllers\Admin\ReportController@index');
        Route::get('/reports/{id}', 'App\Http\Controllers\Admin\ReportController@update');

        Route::get('/helps', 'App\Http\Controllers\Admin\HelpController@index');
        Route::get('/helps/{id}', 'App\Http\Controllers\Admin\HelpController@update');

    });
});


