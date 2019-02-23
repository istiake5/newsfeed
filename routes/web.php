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


Route::group(['prefix'=>'/'],function(){
Route::get('/',['as'=>'layouts.index', 'uses'=>'PostController@home']);

//Route::get('/',['as'=>'layouts.index', 'uses'=>'PostController@latest']);

Route::get('/single{id}',['as'=>'singlePost', 'uses'=>'PostController@single']);

//Route::get('/',['as'=>'layouts.businesssidebar', 'uses'=>'PostController@side']);

  //  return view('layouts.index');
});
//Route::get('/', function () {
 //   return view('layouts.index');
//});





Route::get('/admin/adminindex', function () {
    return view('admin.adminindex');
});

Route::get('createcategory', function () {
    return view('admin.category.createcategory');
});


//Route::group(['prefix'=>'admin','middleware'=>'admin'],function() {

    Route::resource('cat', 'CatController');
    Route::resource('post', 'PostController');
    Route::resource('slider', 'SliderController');
    Route::resource('contact', 'ContactController');
    Route::resource('comment', 'CommentController');
    Route::resource('login', 'LoginController');
//});

Route::resource('user', 'UserController');
Route::resource('mail', 'MailController');

Route::get('/mail/confirmation/{token}', 'MailController@confirmation')->name('confirmation');

Route::get('user/confirmation/{token}', 'UserController@confirmation')->name('confirmation');