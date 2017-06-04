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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactsController@index')->name('contact_index');
Route::get('/contact/create', 'ContactsController@create')->name('contact_create');
Route::post('/contact/store', 'ContactsController@store')->name('contact_store');
Route::get('/contact/{id}/edit', 'ContactsController@edit')->name('contact_edit');
Route::post('/contact/{id}/update', 'ContactsController@update')->name('contact_update');
Route::get('/contact/{id}/delete', 'ContactsController@softDelete')->name('contact_soft_delete');
Route::get('/contact/{slug}', 'ContactsController@detail')->name('contact_detail');

Route::get('/activity/log', 'ContactsController@activityLog')->name('activity_log');


Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
