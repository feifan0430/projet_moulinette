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
Route::get('/', function() {
    return view('index');
});

// Route export
Route::get('/export', function () {
    return view('export');
})->name('export'); // page export
Route::get('/export/equipe', '\App\Http\Controllers\ExportController@exportDatabase_equipe')->name('export_equipe'); // table equipe
Route::get('/export/note', '\App\Http\Controllers\ExportController@exportDatabase_note')->name('export_note'); // table note
Route::get('/export/utilisateur', '\App\Http\Controllers\ExportController@exportDatabase_users')->name('export_users'); // table utilisateur

// Route dashboard
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@showDashboard')->name('showDashboard'); // page dashboard

// Route upload
Route::get('/upload', 'App\Http\Controllers\UploadController@showUploadPage')->name('showUploadPage');
Route::post('/upload/read_csv', 'App\Http\Controllers\UploadController@read_csv')->name('read_csv');

// Route index
Route::get('/index', function() {
    return view('index');
})->name('index');

// Route notation
Route::get('/notation', 'App\Http\Controllers\NotationController@showNotationPage')->name('showNotationPage');
Route::post('/updateNotation', 'App\Http\Controllers\NotationController@updateNotation')->name('updateNotation');
// Route::get('/test', 'App\Http\Controllers\NotationController@test')->name('test');

// Route reset password
Route::get('/reset_password_page', 'App\Http\Controllers\UserPasswordController@showUpdatePasswordPage')->name('showUpdatePasswordPage');
Route::post('/reset_password', 'App\Http\Controllers\UserPasswordController@updatePassword')->name('updatePassword');
Route::get('/test', 'App\Http\Controllers\UserPasswordController@test')->name('test');

// Route mail
Route::any('mail/send','App\Http\Controllers\MailController@sendEmail');