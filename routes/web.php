<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/table', function () {

    $viewdata = DB::table('users')->get();

    return view('/table', ['viewdata' => $viewdata]);

});
Route::get('edit-records',[App\Http\Controllers\HomeController::class,'view']);
Route::get('edit/{id}',[App\Http\Controllers\HomeController::class,'show']);
Route::post('edit/{id}',[App\Http\Controllers\HomeController::class,'edit']);
Route::get('delete/{id}',[App\Http\Controllers\HomeController::class,'delete']);
