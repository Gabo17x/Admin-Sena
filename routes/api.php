<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\ComputersController;
use App\Http\Controllers\TrainingCentersController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Areas
Route::get('Areas', [AreasController::class,'index'])->name('api.v1.Areas.index');
Route::get('Areas/{areas}', [AreasController::class,'show'])->name('api.v1.Areas.show');
Route::put('Areas/{areas}', [AreasController::class,'update'])->name('api.v1.Areas.update');
Route::delete('Areas/{areas}', [AreasController::class,'destroy'])->name('api.v1.Areas.destroy');
Route::post('Areas', [AreasController::class,'store'])->name('api.v1.Areas.store');

//Computers
Route::get('Computers', [ComputersController::class,'index'])->name('api.v1.Computers.index');
Route::get('Computers/{computer}', [ComputersController::class,'show'])->name('api.v1.Computers.show');
Route::put('Computers/{computer}', [ComputersController::class,'update'])->name('api.v1.Computers.update');
Route::delete('Computers/{computer}', [ComputersController::class,'destroy'])->name('api.v1.Computers.destroy');
Route::post('Computers', [ComputersController::class,'store'])->name('api.v1.Computers.store');

//Training_Centers
Route::get('Training_Centers', [TrainingCentersController::class,'index'])->name('api.v1.Training_Centers.index');
Route::get('Training_Centers/{training_center}', [TrainingCentersController::class,'show'])->name('api.v1.Training_Centers.show');
Route::put('Training_Centers/{training_center}', [TrainingCentersController::class,'update'])->name('api.v1.Training_Centers.update');
Route::delete('Training_Centers/{training_center}', [TrainingCentersController::class,'destroy'])->name('api.v1.Training_Centers.destroy');
Route::post('Training_Centers', [TrainingCentersController::class,'store'])->name('api.v1.Training_Centers.store');





