<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiropController;
use App\Http\Controllers\AlcoholTypeController;
use App\Http\Controllers\SoftsController;
use App\Http\Controllers\FruitsController;
use App\Http\Controllers\GlassesController;


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



// Types d'alcools
Route::get(
    '/alcohol/type',
    [AlcoholTypeController::class, 'index']
)->name('type.index');


Route::post(
    'alcohol/type',
    [AlcoholTypeController::class, 'create']
)->name('type.create');


Route::get(
    '/alcohol/{id}/type',
    [AlcoholTypeController::class, 'delete']
)->name('type.delete');


Route::put(
    '/alcohol/{id}/type',
    [AlcoholTypeController::class, 'update']
)->name('type.update');



//Softs (sans alcohol)
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



// Glasses

Route::get(
    '/alcohol/glasse',
    [GlassesController::class, 'index']
)->name('glasse.index');


Route::post(
    'alcohol/glasse',
    [GlassesController::class, 'create']
)->name('glasse.create');


Route::get(
    '/alcohol/{id}/glasse',
    [GlassesController::class, 'delete']
)->name('glasse.delete');


Route::put(
    '/alcohol/{id}/glasse',
    [GlassesController::class, 'update']
)->name('glasse.update');
