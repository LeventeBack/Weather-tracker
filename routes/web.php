<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ErrorMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', 'PagesController@index');

Route::get('/charts', 'PagesController@charts');
Route::get('/charts/data', 'PagesController@chartData');

Route::get('/users', 'PagesController@users');
Route::get('/users/{id}', 'PagesController@singleuser');

Route::resource('sensors', 'SensorsController');
Route::resource('datas', 'DatasController');
Auth::routes();

Route::get('/email', function() {
    Mail::to('email@email.com')->send(new ErrorMail());

    return new ErrorMail();
});
