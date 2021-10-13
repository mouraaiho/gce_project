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


/**
 * 
 * Dashboard routes
 * 
 * **/
Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
Route::get('/dashboard/getunpaidinvoices', 'AjaxController@UnpaidInvoices')->name("ajax.unpaidinvoices");
/**
 * 
 * Client routes
 * 
 * **/
Route::get('/client','ClientController@index')->name('client.index');
Route::get('/client/edit','ClientController@edit')->name('client.edit');
Route::get('/client/delete','ClientController@delete')->name('client.delete');
Route::get('/client/getclients', 'AjaxController@clients')->name("ajax.getclients");
/**
 * 
 * Counter routes
 * 
 * **/
Route::get('/counter','CounterController@index')->name('counter.index');
Route::get('/counter/edit','CounterController@edit')->name('counter.edit');
Route::get('/counter/delete','CounterController@delete')->name('counter.delete');
Route::get('/counter/getcounters', 'AjaxController@counters')->name("ajax.getcounters");
/**
 * 
 * Consumption routes
 * 
 * **/
Route::get('/consumption','ConsumptionController@index')->name('consumption.index');
Route::get('/consumption/edit','ConsumptionController@edit')->name('consumption.edit');
Route::get('/consumption/delete','ConsumptionController@delete')->name('consumption.delete');
Route::get('/consumption/getconsumptions', 'AjaxController@consumptions')->name("ajax.getconsumptions");
Route::get('/consumption/updateconsumption', 'AjaxController@updateConsumption')->name("ajax.updateconsumption");