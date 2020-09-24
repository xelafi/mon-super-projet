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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/','PostController@index')->name('home');

Route::get('/posts', 'PostController@listPosts')->name('posts');
Route::get('/posts/add', 'PostController@add')->name('addPost')->middleware('auth');
Route::post('/posts', 'PostController@store')->name('storePost')->middleware('auth');
Route::get('/posts/{slug}','PostController@details')->name('detailsPost');
Route::get('/posts/{id}/change', 'PostController@change')->name('changePost');
Route::post('/posts/{id}/update', 'PostController@update')->name('updatePost');
Route::delete('/posts/{id}', 'PostController@remove')->name('deletePost');




Route::get('/categories', 'CategoryController@index')->name('categories');
Route::post('/categories', 'CategoryController@store')->name('storeCategory');
Route::get('/categories/{id}/details', 'CategoryController@details')->name('detailsCategory');
Route::post('/categories/{id}/update', 'CategoryController@update')->name('updateCategory');
Route::delete('/categories/{id}', 'CategoryController@remove')->name('deleteCategory');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@email')->name('sendMailContact');
Auth::routes();

Route::get('/logout', function() {
    Auth::logout();
    return redirect()->route('home');
    
});

