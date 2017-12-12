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

// "Pages" pages :^)
Route::get('/', 'PageController@index');

// Admin pages
Route::get('/admin', 'AdminController@index');
Route::get('/admin/modules', 'AdminController@modules');
Route::get('/admin/users', 'AdminController@users');

// User pages
Route::get('/modules', 'UserController@moduleprogress');
Route::get('/modules/{id}', 'UserController@modules');
Route::get('/modules/{id}/quiz', 'UserController@quiz');
Route::post('/modules/{id}/quiz', 'UserController@quizpost');
Route::get('/modules/{id}/quiz/results', 'UserController@quizresults');