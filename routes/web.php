<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('apply_for_loan','HomeController@apply_for_loan')->name('apply_for_loan')->middleware('auth');

Route::POST('send_loan_application','HomeController@send_loan_application')->name('send_loan_application')->middleware('auth');
Route::get('loan_applicant','HomeController@loan_applicant')->name('loan_applicant')->middleware('auth');
