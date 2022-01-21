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
 * User routes
 *
 * **/
Route::get('/user','UserController@index')->name('user.index');
Route::get('/user/edit', 'UserController@edit')->name("user.edit");
Route::get('/user/delete', 'UserController@delete')->name("user.delete");
Route::get('/user/getusers', 'AjaxController@users')->name("ajax.getusers");
/**
 *
 * Client routes
 *
 * **/
Route::get('/client','ClientController@index')->name('client.index');
Route::get('/client/add','ClientController@add')->name('client.add');
Route::post('/client/save','ClientController@save')->name('client.save');
Route::get('/client/edit','ClientController@edit')->name('client.edit');
Route::post('/client/update','ClientController@update')->name('client.update');
Route::get('/client/delete','ClientController@delete')->name('client.delete');
Route::get('/client/getclients', 'AjaxController@clients')->name("ajax.getclients");
/**
 *
 * Counter routes
 *
 * **/
Route::get('/counter','CounterController@index')->name('counter.index');
Route::get('/counter/add','CounterController@add')->name('counter.add');
Route::post('/counter/save','CounterController@save')->name('counter.save');
Route::get('/counter/edit','CounterController@edit')->name('counter.edit');
Route::post('/counter/update','CounterController@update')->name('counter.update');
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
Route::get('/consumption/printlistmonthconsumption','ConsumptionController@printMonthConsumption')->name('consumption.printlistmonthconsumption');
/**
 *
 * Invoice routes
 *
 * **/
Route::get('/invoice','InvoiceController@index')->name('invoice.index');
Route::get('/invoice/add','InvoiceController@add')->name('invoice.add');
Route::post('/invoice/save','InvoiceController@save')->name('invoice.save');
Route::get('/invoice/delete','InvoiceController@delete')->name('invoice.delete');
Route::get('/invoice/getinvoices', 'AjaxController@invoices')->name("ajax.getinvoices");
Route::get('/invoice/selectedinvoice', 'AjaxController@selectedInvoice')->name("ajax.selectedinvoice");
Route::get('/invoice/emptyselectedinvoice', 'AjaxController@emptySelectedInvoice')->name("ajax.emptyselectedinvoice");
Route::get('/invoice/addselectedinvoice', 'AjaxController@addSelectedInvoice')->name("ajax.addselectedinvoice");
Route::get('/invoice/updateinvoice', 'AjaxController@updateInvoice')->name("ajax.updateinvoice");
/**
 *
 * Payment routes
 *
 * **/
Route::get('/payment','PaymentController@index')->name('payment.index');
Route::get('/payment/edit','PaymentController@edit')->name('payment.edit');
Route::get('/payment/delete','PaymentController@delete')->name('payment.delete');
Route::get('/payment/printreceipt','PaymentController@printReceipt')->name('payment.printreceipt');
Route::get('/payment/getpayments', 'AjaxController@payments')->name("ajax.getpayments");
Route::get('/payment/updatepayment', 'AjaxController@updatePayment')->name("ajax.updatepayment");
Route::get('/payment/detailspayment', 'PaymentController@detailsPayment')->name("payment.detailspayment");
/**
 *
 * Config routes
 *
 * **/
Route::get('/config','ConfigController@index')->name('config.index');
Route::get('/config/updateconfig', 'AjaxController@updateConfig')->name("ajax.updateconfig");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
