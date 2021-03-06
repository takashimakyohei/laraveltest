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
// ルート
Route::get('/','PostsController@index')->name('posts.index');
// ルートページにpostでアクセスされたら、Postsコントローラの@storeを呼び出す
Route::post('/', 'PostsController@store')->name('posts.store');

// 編集
Route::get('posts/edit/{post_id}', 'PostsController@edit')->name('posts.edit');
// 更新
Route::put('posts/{post_id}', 'PostsController@update')->name('posts.update');
// 削除
Route::delete('/{id}', 'PostsController@destroy')->name('posts.destroy');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    //投稿一覧で、プロフィール画像変更
    Route::group(['middleware' => ['auth']], function () {
      //ここでルート定義
      Route::get('/profile', 'ProfileController@index');
      Route::post('/profile', 'ProfileController@store');
    });