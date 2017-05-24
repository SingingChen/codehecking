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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}','AdminPostController@post');


Route::group(['middleware'=>'admin'],function (){
    oute::get('/admin',function (){

        return view('admins.index');
    });

    Route::resource('admin/users','AdminUserController');
    Route::resource('admin/posts','AdminPostController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediasController');

    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comment/replies','CommentRepliesController');

});

