<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiropController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/alcohol/sirop',
    [SiropController::class, 'index']
)->name('sirop.index');


Route::get(
    '/alcohol/sirop',
    [SiropController::class, 'index']
)->name('sirop.create');

