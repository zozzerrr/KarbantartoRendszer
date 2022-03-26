<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\VegzettsegController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/test', [UserController::class, 'index'])->middleware('auth');;

Route::resource('/vegzettsegek', VegzettsegController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/tools', ToolController::class)->middleware(['auth']);

Route::get('/welcome', function(){
    return view('welcome');



});