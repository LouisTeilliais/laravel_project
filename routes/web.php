<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiropController;
use App\Http\Controllers\SoftsController;
use App\Http\Controllers\FruitsController;


//Menu des alcohols
Route::get('/', function () {
    return view('welcome');
})->name("home");

//Sirop 
Route::get(
    '/alcohol/sirop',
    [SiropController::class, 'index']
)->name('sirop.index');


Route::post(
    '/alcohol/sirop',
    [SiropController::class, 'create']
)->name('sirop.create');

Route::get(
    '/alcohol/{id}/sirop',
    [SiropController::class, 'delete']
)->name('sirop.delete');

Route::put(
    '/alcohol/{id}/sirop',
    [SiropController::class, 'update']
)->name('sirop.update');



//Softs (sans alcool)
Route::get(
    '/alcohol/softs',
    [SoftsController::class, 'index']
)->name('softs.index');

Route::post(
    '/alcohol/softs',
    [SoftsController::class, 'create']
)->name('softs.create');

Route::get(
    '/alcohol/{id}/softs',
    [SoftsController::class, 'delete']
)->name('softs.delete');

Route::put(
    '/alcohol/{id}/softs',
    [SoftsController::class, 'update']
)->name('softs.update');

//Fruits
Route::get(
    '/alcohol/fruits',
    [FruitsController::class, 'index']
)->name('fruits.index');

Route::post(
    '/alcohol/fruits',
    [FruitsController::class, 'create']
)->name('fruits.create');

Route::get(
    '/alcohol/{id}/fruits',
    [FruitsController::class, 'delete']
)->name('fruits.delete');

Route::put(
    '/alcohol/{id}/fruits',
    [FruitsController::class, 'update']
)->name('fruits.update');

// Route::post(
//     '/alcohol/{id}/fruits',
//     [FruitsController::class, 'save']
// )->name('fruits.save');