<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiropController;
use App\Http\Controllers\AlcoholTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/alcohol/sirop',
    [SiropController::class, 'index']
)->name('sirop.index');


Route::post(
    '/alcohol/sirop',
    [SiropController::class, 'create']
)->name('sirop.create');


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