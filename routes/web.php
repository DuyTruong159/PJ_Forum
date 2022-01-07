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

Route::get('/', ['as'=>'home', 'uses'=>'TagController@index']);
Route::get('/blog-detail/{blogId}', ['as'=>'blogDetail', 'uses'=>'BlogController@blogDetail']);
Route::get('/blog-post', ['as'=>'blogPost', 'uses'=>'TagController@blogPost']);
Route::get('/search', ['as'=>'blogSearch', 'uses'=>'BlogController@search']);
Route::get('/tieude/{tagId}', ['as'=>'tagDetail', 'uses'=>'TagController@TagDetail']);
Route::get('/logout', ['as'=>'logout', 'uses'=>'UserController@logout']) -> middleware('login');

Route::post('/blog-post', ['as'=>'blogpostdone', 'uses'=>'BlogController@insert']) -> middleware('login');
Route::post('/contact', ['as'=>'contactmail', 'uses'=>'MailController@sendMail']);
Route::post('/blog-detail/{blogId}', ['as'=>'commentsuccess', 'uses'=>'CommentController@insert']) -> middleware('login');
Route::post('/register', ['as'=>'registerdone', 'uses'=>'UserController@insert']);
Route::post('/', ['as'=>'login', 'uses'=>'UserController@login']);

Route::view('/register', 'register');
Route::view('/contact', 'contact');

//-----------------Admin-----------------//
Route::middleware(['admin','login']) -> group(function () {
    Route::get('/admin/blog', ['as'=>'blogA', 'uses'=>'BlogController@blogAll']);
    Route::get('/admin/blog-post', ['as'=>'blogPostA', 'uses'=>'TagController@BlogA']);
    Route::get('/admin/blog-update/{blogId}', ['as'=>'blogUpdateA', 'uses'=>'BlogController@blogUpdate']);
    Route::get('/admin/tag', ['as'=>'tagA', 'uses'=>'TagController@TagA']);
    Route::get('/admin/comment', ['as'=>'commentA', 'uses'=>'CommentController@CommentA']);
    Route::get('/admin/blog/delete/{blogId}', ['as'=>'blogAdelete', 'uses'=>'BlogController@delete']);
    Route::get('/admin/comment/delete/{commentId}', ['as'=>'commentAdelete', 'uses'=>'CommentController@delete']);
    Route::get('/admin/tag/delete/{tagId}', ['as'=>'tagAdelete', 'uses'=>'TagController@delete']);
    Route::get('/admin', ['as'=>'chartA', 'uses'=>'BlogController@chart']);
    Route::get('/adminChart', ['as'=>'chartFormat', 'uses'=>'BlogController@chartFormat']);

    Route::post('/admin/blog-post', ['as'=>'blogPostAdone', 'uses'=>'BlogController@blogInsert']);
    Route::post('/admin/blog-update/{blogId}', ['as'=>'blogUpdateAdone', 'uses'=>'BlogController@blogUpdateDone']);
    Route::post('/admin/comment', ['as'=>'commentInsertAdone', 'uses'=>'CommentController@CommentAinsert']);
    Route::post('/admin/comment/update/{commentId}', ['as'=>'commentUpdateAdone', 'uses'=>'CommentController@update']);
    Route::post('/admin/tag', ['as'=>'tagInsertAdone', 'uses'=>'TagController@insert']);
    Route::post('/admin/tag/update/{tagId}', ['as'=>'tagUpdateAdone', 'uses'=>'TagController@update']);
});
