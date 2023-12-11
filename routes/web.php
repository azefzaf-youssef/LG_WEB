<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('HOME');
Route::get('button', function(){
    return view('button');
})->name('BUTTON');

Route::get('test', function(){
    return view('test');
})->name('TEST');

Route::get('ajouter', function(){
    return view('ajouter');
})->name('ajouter');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
