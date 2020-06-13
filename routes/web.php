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

Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware' => 'auth'], function() {
Route::get('/posts', 'PostController@index')->name('posts.index');

//route for rendering form
Route::get('/posts/create', 'PostController@create')->name('posts.create');


//route for taking the submition and storing the data in db
Route::post('/posts', 'PostController@store')->name('posts.store');



Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    
Route::put('/posts/{post}', 'PostController@update')->name('posts.update');

Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

Route::get('/posts/{post}', 'PostController@show')->name('posts.show');


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');



//goooooooooooogle route

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::post('pay','PaymentController@payWithpaypal')->name('pay');
Route::get('status','PaymentController@status')->name('status');
Route::get('canceled','PaymentController@canceled')->name('canceled');