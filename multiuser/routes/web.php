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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
    //
});
Route:: prefix('admin') -> group(function (){
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('user', 'AdminController')->except([
        'show']);
    Route::get('/setting','SettingController@show');
    Route::post('/setting/ubah','SettingController@change')->name('setting');
});

Route:: prefix('user') -> group(function (){
    Route::get('', function () {
        return view('user.index');    
    });
    Route::resource('user', 'UserController')->only([
        'show', 'edit', 'update']);
    Route::get('/setting','SettingController@show');
    Route::post('/setting/ubah','SettingController@change')->name('setting');

    // Route:: resource('profile', 'ProfileController')->only([
    //     'show', 'edit', 'update']);
});
