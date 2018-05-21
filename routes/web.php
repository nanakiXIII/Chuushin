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

//Route::get('/', function () {
   // return view('home');
//});

Auth::routes();

Route::get('/', 'PostController@index')->name('home');
Route::resource('users', 'UserController');
Route::get('/account', 'UserController@account')->name('users.account');

Route::get('/groups', 'GroupController@index')->name('groups');
Route::get('/spy/{id}', 'Auth\LoginController@spy')->name('spy');
Route::post('/groups/{id}/notify', 'GroupController@notify')->name('notify');

Route::get('/projets/{type}/', 'SerieController@index')->name('serie');
Route::get('/projets/{type}/{slug}', 'SerieController@detail')->name('serie.detail');

Route::group(['prefix' => 'admin'], function (){
    Route::group(['prefix' =>'projets'], function (){
        Route::get('{type}/', 'SerieController@list')->name('admin.serie.list');
        Route::get('{type}/{slug}/', 'SerieController@adminDetail')->name('admin.serie.detail');
    });
    Route::group(['prefix' =>'nouveau'], function (){
        Route::get('serie/{type}', 'SerieController@create')->name('admin.serie.new');
        Route::post('serie/{type}', 'SerieController@insert')->name('admin.serie.create');
    });
    Route::group(['prefix' =>'update'], function (){
        Route::get('serie/{type}/{slug}', 'SerieController@edit')->name('admin.serie.edit');
        Route::put('serie/{type}/{slug}', 'SerieController@update')->name('admin.serie.update');
    });
    Route::group(['prefix' =>'publication'], function (){
        Route::get('serie/{id}/{value}', 'SerieController@pub')->name('admin.serie.pub');
        Route::put('serie/{id}','SerieController@etat')->name('admin.serie.etat');
    });
    Route::group(['prefix' =>'delete'], function (){
        Route::delete('serie/{type}/{id}/', 'SerieController@destroy')->name('admin.serie.delete');
    });
});

Route::get('/account/avatar', 'UserController@profile')->name('users.avatar');
Route::post('/account/avatar', 'UserController@update_avatar')->name('users.postAvatar');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');
//Route::get('/account', 'HomeController@account')->name('account');
