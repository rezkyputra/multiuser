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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
})->middleware('web', 'guest');

Route:: prefix('admin') -> group(function (){
    Route::resource('user', 'AdminController');
});

Route::resource('profile', 'ProfileController')->only([
'index', 'edit', 'update', 'store']);

Route::get('/setting','SettingController@show');
Route::post('/setting/ubah','SettingController@change')->name('setting');

Route::get('/ganti','GantiController@show');
Route::post('/ganti/ubah','GantiController@change')->name('ganti');

Route::group(['middleware' => ['web', 'auth']], function(){
        Route::get('/dashboard', function(){
            if (Auth::user()->role_id == 0){
                return view('admin.index'); 
            }else{
                return view('user.index');
            }
        });
    });
