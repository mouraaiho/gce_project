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

Route::get('/dashboard','DashboardController@index')->name('dashboard.index');


Route::get('/dashboard/getunpaidinvoices', 'AjaxController@UnpaidInvoices')->name("ajax.unpaidinvoices");
Route::get('/client/getclients', 'AjaxController@clients')->name("ajax.getclients");

Route::get('/client','ClientController@index')->name('client.index');
Route::get('/client/edit','ClientController@edit')->name('client.edit');
Route::get('/client/delete','ClientController@delete')->name('client.delete');