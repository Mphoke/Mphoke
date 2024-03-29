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
    return view('auth.login');
});

// Defining routes for profile,post and category


Route::get('/post','PostController@post');
Route::get('/profile','ProfileController@profile');
Route::get('/category','CategoryController@category');

// Routs for get end here

// Defining post routes for addCategory,....

Route::post('/addCategory','CategoryController@addCategory');

// Routes get ends here

Route::post('/addProfile','ProfileController@addProfile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//addPost
Route::post('/addPost', 'PostController@addPost');
// View and Edit routes
Route::get('/view/{id}', 'PostController@view');
Route::get('/edit/{id}', 'PostController@edit');

Route::post('/editPost/{id}', 'PostController@editPost');
Route::get('/delete/{id}', 'PostController@deletePost');
Route::get('/category/{id}', 'PostController@category');
Route::get('/like/{id}', 'PostController@like');
Route::get('/dislike/{id}', 'PostController@dislike');
Route::post('/comment/{id}', 'PostController@comment');