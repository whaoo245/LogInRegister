<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\UserController;
use App\Models\user;
use App\Http\Controllers\register;

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

Route::get('/Signup', function () {
    return view('Signup');
});

Route::get('/Homepage', function(){
   return view('Homepage'); 
});

Route::get('insert',[register::class,'insertform']);
Route::post('/Signup',[register::class,'insert']);
Route::get('/Login',[register::class,'login']);
Route::post('/Login',[register::class,'checklogin']);

Route::get('/list', function () {

    $viewdata = DB::table('users')->get();

    return view('/list', ['viewdata' => $viewdata]);

});

Route::get('edit-records',[App\Http\Controllers\UserController::class,'view']);
Route::get('edit/{Email}',[App\Http\Controllers\UserController::class,'show']);
Route::post('edit/{Email}',[App\Http\Controllers\UserController::class,'edit']);
Route::get('delete/{Email}',[App\Http\Controllers\UserController::class,'delete']);



