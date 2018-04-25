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
//    return view('welcome');
//});

//index route to show currency conversion form
Route::get('/',[
    'as'=>'index', 'uses' => 'CurrencyConversionController@index'
]);

//route where currency conversion take place
Route::post('/convert_currency',[
    'as'=>'convert_currency', 'uses' => 'CurrencyConversionController@convertCurrency'
]);