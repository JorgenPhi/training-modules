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
Route::resource('/admin/modules', 'AdminModulesController');
Route::resource('/admin/users', 'AdminUsersController');
Route::resource('/admin/modules/{module_id}/quiz', 'AdminQuizzesController');

// User pages
Route::get('/modules', 'UserController@moduleprogress');
Route::get('/modules/{id}', 'UserController@modules');
Route::get('/modules/{id}/quiz', 'UserController@quiz');
Route::post('/modules/{id}/quiz', 'UserController@quizpost');
Route::get('/modules/{id}/quiz/results', 'UserController@quizresults');