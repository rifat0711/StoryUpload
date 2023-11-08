<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\Auth\LoginController;





Route::get('/', function () {
    return view('welcome');
});
Route::view('/', 'auth.login');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    //Route::get('/stories','StoriesController@index');
    // Route::get('/stories', [StoriesController::class, 'index'])->name('stories.index');
    // Route::get('/stories/{story}', [StoriesController::class, 'show'])->name('stories.show');
    Route::resource('stories', StoriesController::class);
   // Route::resource('students', StoriesController::class);

});

