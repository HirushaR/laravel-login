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
})->name('welcome');

Route::group(['middleware' => ['web']], function () {


    Route::post('/signup',  "UserController@postSignUp")->name('signup');

    Route::post('/signin',  "UserController@postSignIn")->name('signin');

    Route::get('/dashboard',  "PostController@getdashboard")->name('dashboard')->middleware('auth');

    Route::post('/createpost',"PostController@postCreatePost")->name('post.create');

    Route::get('/delete-post/{post_id}',"PostController@getDeletePost")->name('post.delete')->middleware('auth');

    Route::get('/logout',"UserController@getLogout")->name('logout');

});




