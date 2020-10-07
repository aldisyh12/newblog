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

Route::get('/', 'BlogController@index');
Route::get('/isi_post/{slug}', 'BlogController@isi_post')->name('blog.isi_post');
Route::get('/list_post', 'BlogController@list_blog')->name('blog.list_post');
Route::get('/list_category/{category}', 'BlogController@list_category')->name('blog.category');
Route::get('/list_tags/{tags}', 'BlogController@list_tags')->name('blog.tags');
Route::get('/cari', 'BlogController@cari')->name('blog.cari');
Route::get('/about', 'BlogController@about')->name('blog.about');
Route::get('/contact', 'BlogController@contact')->name('blog.contact');
Route::post('/contact', 'BlogController@sendemail')->name('blog.contact.email');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');

	Route::resource('/category', 'CategoryController');
	Route::resource('/tag', 'TagController');
	Route::resource('/post', 'PostController');
	Route::resource('/user', 'UserController');
	Route::get('profile', 'UserController@profile')->name('user.profile');
});