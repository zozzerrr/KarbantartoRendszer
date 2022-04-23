<?php

use App\Models\Vegzettseg;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\VegzettsegController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth','checkRole:3'])->group(function () {

    Route::resource('vegzettsegek', VegzettsegController::class);

    Route::get('vegoria/{id}', [VegzettsegController::class,'findRemainingCategories']);
    Route::post('vegoria', [VegzettsegController::class,'addCategory'])->name('vegoria.addCategory');

    Route::get('karbantartok', [OperatorController::class,'getAllKarbantarto'])->name('karbantartok.getAllKarbantarto');
    Route::get('karbantartok/{id}', [OperatorController::class,'getAvailableVegzettsegek'])->name('karbantartok.getAvailableVegzettsegek');
    Route::post('karbantartok', [OperatorController::class,'addVegzettseg'])->name('karbantartok.addVegzettseg');
});


Route::middleware(['auth','checkRole:2'])->group(function () {

    Route::resource('/tools', ToolController::class);
    Route::resource('categories', CategoryController::class)
        ->names('categories');

});
