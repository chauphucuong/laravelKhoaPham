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
//CkEditor và Ck Finder
Route::get('index', function () {
    return view('index');
});




Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'cate'],function(){
        Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
        Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
        Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
    });
    Route::group(['prefix'=>'product'],function(){
        Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
        Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
        Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
        Route::get('delimg/{id}',['as'=>'admin.product.getDelimg','uses'=>'ProductController@getDelImg']);
    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
        Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
        Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
        Route::post('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
    });
});
Auth::routes();

Route::get('admin/loginUser',['as'=>'getLogin','uses'=>'Auth\LoginController@getLogin']);
Route::post('admin/loginUser',['as'=>'postLogin','uses'=>'Auth\LoginController@postLogin']);
Route::get('admin/logoutUser',['as'=>'getLogout','uses'=>'Auth\LoginController@getLogout']);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/frontend', function () {
    return view('user.pages.home');
});

