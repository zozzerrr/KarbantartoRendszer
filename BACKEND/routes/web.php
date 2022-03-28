<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\VegzettsegController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/test', [UserController::class, 'index'])->middleware('auth');;

Route::resource('vegzettsegek', VegzettsegController::class);
Route::resource('categories', CategoryController::class)
    ->names('categories');

//->middleware(['checkRole:1']);


// Route::get('/categories', [CategoryController::class, 'index'])->middleware(['checkRole:1,2,3']);
// Route::put('/gepek/{gep_id}', [CategoryController::class, 'update'])->middleware(['checkRole:3']);
//Route::delete('/gepek/{gep_id}', [CategoryController::class, 'delete'])->middleware(['checkRole:2']);
Route::resource('/tools', ToolController::class);//->middleware(['checkRole:2']);
