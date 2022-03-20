<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiropController;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get(
    '/alcohol/sirop',
    [SiropController::class, 'index']
)->name('sirop.index');


Route::post(
    '/alcohol/sirop',
    [SiropController::class, 'create']
)->name('sirop.create');

