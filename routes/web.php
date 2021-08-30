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


Route::get('/', 'App\Http\Controllers\PageController@index')->name('index');


Route::get('contact', 'App\Http\Controllers\PageController@contact');
Route::post('contact', 'App\Http\Controllers\PageController@storeContant');
Route::get('clear-my-name','App\Http\Controllers\PageController@clearName');

Route::get('about', 'App\Http\Controllers\PageController@about');

Route::get('system-closed', function(){
  return "sorry not work to day";
});

Route::put('contact', function(){
  echo "put done";
});

Route::get('user/{id?}/email/{email?}',function($id = null , $email = null){
  echo "user id is ". $id."and email is".$email;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('articles','App\Http\Controllers\ArticleController');

Route::post('comments/{article}', 'App\Http\Controllers\CommentController@store')->name('comments.store');
