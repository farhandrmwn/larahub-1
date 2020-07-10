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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', 'PertanyaanController@index');
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::post('/pertanyaan/create', 'PertanyaanController@store');

Route::get('/jawaban/create/{id}', 'JawabanController@create');
Route::post('/jawaban/create/{id}', 'JawabanController@store');

Route::put('/pertanyaan/{id}/vote/{tipe_vote}', 'VoteController@pertanyaan');
Route::put('/jawaban/{id}/vote/{tipe_vote}', 'VoteController@jawaban');
Route::get('/pertanyaan/{a}', 'JawabanController@index');
Route::get('/pertanyaan/detail/{id}', 'PertanyaanController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
