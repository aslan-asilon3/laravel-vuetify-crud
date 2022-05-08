<?php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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


Route::get('/','App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::get('home', 'HomeController@index');
Route::get('/create','App\Http\Controllers\StudentController@create')->name('create');
Route::post('/create','App\Http\Controllers\StudentController@store')->name('store');
Route::get('/edit/{id}','App\Http\Controllers\StudentController@edit')->name('edit');
Route::post('/update/{id}','App\Http\Controllers\StudentController@update')->name('update');
Route::delete('/delete/{id}','App\Http\Controllers\StudentController@delete')->name('delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
