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

Route::get('/welcome', function () {
    return view('welcome_basic');
})->middleware('auth.basic');

Route::get('/', ['as'=>'home','uses'=>'AppController@index']);

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'PerfilController@index')->name('perfil');

Route::get('/cambiarPerfil', 'PerfilController@cambiar')->name('cambiarPerfil');

Route::get('/message', 'MessageController@index')->name('messages');

Route::get('/message/create', 'MessageController@create')->name('messages.create');

Route::put('/message/store', 'MessageController@store')->name('messages.store');

Route::get('/message/show/{id}', 'MessageController@show')->name('messages.show');

Route::delete('/message/destroy/{id}', 'MessageController@destroy')->name('messages.destroy');

Route::post('/message/edit/{id}', 'MessageController@edit')->name('messages.edit');

Route::put('/message/update/{id}', 'MessageController@update')->name('messages.update');

