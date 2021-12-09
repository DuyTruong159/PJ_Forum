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

Route::post('/blog-post', ['as'=>'blogpostdone', 'uses'=>'BlogController@insert']);
Route::post('/contact', ['as'=>'contactmail', 'uses'=>'MailController@sendMail']);
Route::post('/blog-detail/{blogId}', ['as'=>'commentsuccess', 'uses'=>'CommentController@insert']);
Route::post('/register', ['as'=>'registerdone', 'uses'=>'UserController@insert']);

Route::view('/register', 'register');
Route::view('/contact', 'contact');

