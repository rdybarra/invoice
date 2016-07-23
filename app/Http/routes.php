<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Client;
use Illuminate\Http\Request;

Route::get('/', 'DashboardController@index');

Route::resource('clients', 'ClientController');

Route::resource('invoices', 'InvoiceController');
Route::resource('invoices/{invoiceId}/line-items', 'LineItemController');
Route::get('invoices/{invoiceId}/line-items/{id}/delete', 'LineItemController@destroy');
Route::get('invoices/{id}/print', 'InvoiceController@print');

Route::resource('payments', 'PaymentController');

Route::get('settings', 'SettingGroupController@edit');
Route::put('settings', 'SettingGroupController@update');
