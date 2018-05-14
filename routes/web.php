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

Route::get('/projets/{type}/', 'serieController@index')->name('serie');
Route::get('/projets/{type}/{slug}', 'serieController@detail')->name('serie.detail');

Route::group(['prefix' => 'admin'], function (){
    Route::group(['prefix' =>'projets'], function (){
        Route::get('{type}/', 'serieController@list')->name('admin.serie.list');
        Route::get('{type}/{slug}/', 'serieController@adminDetail')->name('admin.serie.detail');
        Route::get('nouveau', 'serieController@create')->name('admin.serie.new');
    });
    Route::group(['prefix' =>'nouveau'], function (){
        Route::get('serie/{type}', 'serieController@create')->name('admin.serie.new');
        Route::post('serie/{type}', 'serieController@insert')->name('admin.serie.create');
    });

});

Route::get('/account/avatar', 'UserController@profile')->name('users.avatar');
Route::post('/account/avatar', 'UserController@update_avatar')->name('users.postAvatar');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');
//Route::get('/account', 'HomeController@account')->name('account');
