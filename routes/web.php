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

// Route export by Fan
Route::get('/export', function () {
    return view('export');
})->name('export'); // page export
Route::get('/export/equipe', '\App\Http\Controllers\ExportController@exportDatabase_equipe')->name('export_equipe'); // table equipe
Route::get('/export/note', '\App\Http\Controllers\ExportController@exportDatabase_note')->name('export_note'); // table note
Route::get('/export/utilisateur', '\App\Http\Controllers\ExportController@exportDatabase_utilisateur')->name('export_utilisateur'); // table utilisateur

// Route dashboard by Fan
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@showDashboard')->name('showDashboard'); // page dashboard

// Route upload by Fan
Route::get('/upload', 'App\Http\Controllers\UploadController@showUploadPage')->name('showUploadPage');
Route::post('/upload/read_csv', 'App\Http\Controllers\UploadController@read_csv')->name('read_csv');