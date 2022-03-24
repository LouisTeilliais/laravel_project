<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiropController;
use App\Http\Controllers\AlcoholTypeController;
use App\Http\Controllers\SoftsController;


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

// Route::get(
//     '/alcohol/{id}/softs',
//     [SoftsController::class, 'modifier']
// )->name('softs.modifier');

