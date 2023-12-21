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



Route::prefix('utilisateur')->group(function () {

    Route::post('/new', [App\Http\Controllers\UserController::class, 'addPost'])->name('USER-LOGGED-ADD-POST');
    Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('USER-LOGGED-INDEX');
    Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'deleteIllustration'])->name('USER-LOGGED-DELETE-ILUSTRATION');
    Route::get('/add/{id}', [App\Http\Controllers\UserController::class, 'addComposantIllustration'])->name('USER-LOGGED-ADD-COMPOSANT-ILUSTRATION');
    Route::get('/voir/{id}', [App\Http\Controllers\UserController::class, 'afficherIllustration'])->name('USER-LOGGED-AFFICHER-ILUSTRATION');


});
