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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/test',function (){
////    return 'welcome';
//   return App\Profile::find(1)->user;
//});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::post('/post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');

    Route::resource('/post', 'PostController');

    Route::resource('/tag', 'TagController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/category', 'CategoryController');

    Route::resource('/user/profile', 'ProfileController')->only(['index', 'update']);

    Route::resource('/user', 'UserController');
    Route::get('/user/admin/{id}', 'UserController@admin')->name('user.admin');
    Route::get('/user/notadmin/{id}', 'UserController@notAdmin')->name('user.notadmin');



});


