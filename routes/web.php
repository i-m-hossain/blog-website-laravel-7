<?php

use Spatie\Newsletter\NewsletterFacade;
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
Route::get('/post/{slug}','FrontEndController@singlePost')->name('post.single');


Route::post('/subscribe', function (){
    $email = request('email');
    if ( ! Newsletter::isSubscribed($email) ) {
        Newsletter::subscribe($email);
        return redirect()->back()->with('message','Successfully subscribed');

    }else{
        return redirect()->back()->with('error','You are already subscribed');
    }
})->name('subscribe.mailchimp');




Route::get('/user/post/{id}','FrontEndController@userPost')->name('user.post');

//search  query
Route::get('/results',function (){

       $posts = \App\Post::where('title','like','%'.request('query').'%')->get();
       $request= 'Search results:'.request('query');
       $setting = \App\Setting::first();
       $categories = \App\Category::all()->take(5);
       $tags = \App\Tag::all();

       return view('results',compact([
           'posts',
           'request',
           'setting',
           'categories',
           'tags'
       ]));
    })->name('search.result');

Route::get('/tag/{id}','FrontEndController@tag')->name('tag.single');
Route::get('/category/{id}','FrontEndController@category')->name('category.single');
Route::get('/',  'FrontEndController@index')->name('homeFront');

Auth::routes();


Route::middleware('auth')->prefix('admin')->group(function () {


    Route::resource('/settings','settingController')->only(['index','update']);

    Route::post('/post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');

    Route::resource('/post', 'PostController');

    Route::resource('/tag', 'TagController');

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::resource('/category', 'CategoryController');

    Route::resource('/user/profile', 'ProfileController')->only(['index', 'update']);

    Route::resource('/user', 'UserController');
    Route::get('/user/admin/{id}', 'UserController@admin')->name('user.admin');
    Route::get('/user/notadmin/{id}', 'UserController@notAdmin')->name('user.notadmin');





});



