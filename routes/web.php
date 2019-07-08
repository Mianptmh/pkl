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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/archive', function () {
    return view('archive');
});

Route::get('/audio-post', function () {
    return view('audio-post');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/gallery-post', function () {
    return view('gallery-post');
});

Route::get('/image-post', function () {
    return view('image-post');
});

Route::get('/standard-post', function () {
    return view('standard-post');
});

Route::get('/video-post', function () {
    return view('video-post');
});


Route::get('/admin',function() {
    return view('welcome');
});

Route::resource('/admin/artikel','ArtikelController');
Route::resource('/admin/kategori','KategoriController');
Route::resource('/admin/tag','TagController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
