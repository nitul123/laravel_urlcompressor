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
Route::post('/uRLGenerators', [App\Http\Controllers\URLGeneratorController::class,'store'])->name('save_url');

Route::get('/home', [App\Http\Controllers\URLGeneratorController::class, 'index'])->name('home');
Route::get('/{id}', [App\Http\Controllers\URLGeneratorController::class, 'search_data']);
