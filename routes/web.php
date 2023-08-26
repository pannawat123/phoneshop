<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\phoneController;

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
    return view('layouts.master');
});

Route::get('phone', [App\Http\Controllers\phoneController::class, 'index']);
Route::post('phone/search', [App\Http\Controllers\phoneController::class, 'search']);
Route::get('phone/edit/{id?}', [App\Http\Controllers\phoneController::class, 'edit']);
Route::post('phone/update', [App\Http\Controllers\phoneController::class, 'update']);
Route::post('phone/edit', [App\Http\Controllers\phoneController::class, 'insert']);
Route::get('phone/remove/{id}', [App\Http\Controllers\phoneController::class, 'remove']);


Route::get('/typephone', [App\Http\Controllers\TypephoneController::class, 'index']);
Route::post('typephone/search', [App\Http\Controllers\TypephoneController::class, 'search']);
Route::get('typephone/edit/{id?}', [App\Http\Controllers\TypephoneController::class, 'edit']);
Route::post('typephone/update', [App\Http\Controllers\TypephoneController::class, 'update']);
Route::post('typephone/edit', [App\Http\Controllers\TypephoneController::class, 'insert']);
Route::get('typephone/remove/{id}', [App\Http\Controllers\TypephoneController::class, 'remove']);