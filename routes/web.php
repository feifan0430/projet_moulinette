<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\NotationController;

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

Route::get('/', '\App\Http\Controllers\FormController@getForm');
Route::get('/getUsers', 'App\Http\Controllers\FormController@getUsersAjax');
Route::post('/notation', 'App\Http\Controllers\NotationController@getForm');
Route::post('/confirmNote', 'App\Http\Controllers\NotationController@applyNotes');
