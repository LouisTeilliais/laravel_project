<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiropController;
use App\Http\Controllers\AlcoholTypeController;
use App\Http\Controllers\SoftsController;
use App\Http\Controllers\FruitsController;
use App\Http\Controllers\GlassesController;
use App\Http\Controllers\AlcoholBrandController;
use App\Http\Controllers\CocktailsController;
use App\Http\Controllers\HomeController;



//Menu des alcohols
// Route::get('/', function () {
//     return view('home');
// })->name("home");

Route::get(
    '/home',
    [HomeController::class, 'index']
)->name('home');

Route::get('/admin', function () {
    return view('admin');
})->name("admin");

//Sirop 
Route::get(
    '/admin/sirop',
    [SiropController::class, 'index']
)->name('sirop.index');

Route::post(
    '/admin/sirop',
    [SiropController::class, 'create']
)->name('sirop.create');

Route::get(
    '/admin/{id}/sirop',
    [SiropController::class, 'delete']
)->name('sirop.delete');

Route::put(
    '/admin/{id}/sirop',
    [SiropController::class, 'update']
)->name('sirop.update');


// Types d'alcools
Route::get(
    '/admin/type',
    [AlcoholTypeController::class, 'index']
)->name('type.index');


Route::post(
    'admin/type',
    [AlcoholTypeController::class, 'create']
)->name('type.create');


Route::get(
    '/admin/{id}/type',
    [AlcoholTypeController::class, 'delete']
)->name('type.delete');


Route::put(
    '/admin/{id}/type',
    [AlcoholTypeController::class, 'update']
)->name('type.update');



//Softs
Route::get(
    '/admin/softs',
    [SoftsController::class, 'index']
)->name('softs.index');

Route::post(
    '/admin/softs',
    [SoftsController::class, 'create']
)->name('softs.create');

Route::get(
    '/admin/{id}/softs',
    [SoftsController::class, 'delete']
)->name('softs.delete');

Route::put(
    '/admin/{id}/softs',
    [SoftsController::class, 'update']
)->name('softs.update');

//Fruits
Route::get(
    '/admin/fruits',
    [FruitsController::class, 'index']
)->name('fruits.index');

Route::post(
    '/admin/fruits',
    [FruitsController::class, 'create']
)->name('fruits.create');

Route::get(
    '/admin/{id}/fruits',
    [FruitsController::class, 'delete']
)->name('fruits.delete');

Route::put(
    '/admin/{id}/fruits',
    [FruitsController::class, 'update']
)->name('fruits.update');



// Glasses

Route::get(
    '/admin/glasse',
    [GlassesController::class, 'index']
)->name('glasse.index');


Route::post(
    'admin/glasse',
    [GlassesController::class, 'create']
)->name('glasse.create');


Route::get(
    '/admin/{id}/glasse',
    [GlassesController::class, 'delete']
)->name('glasse.delete');


Route::put(
    '/admin/{id}/glasse',
    [GlassesController::class, 'update']
)->name('glasse.update');


// alcohol brand 
Route::get(
    '/admin/brand',
    [AlcoholBrandController::class, 'index']
)->name('brand.index');


Route::post(    
    'admin/brand',
    [AlcoholBrandController::class, 'create']
)->name('brand.create');


Route::get(
    '/admin/{id}/brand',
    [AlcoholBrandController::class, 'delete']
)->name('brand.delete');


Route::put(
    '/admin/{id}/brand',
    [AlcoholBrandController::class, 'update']
)->name('brand.update');

// Cocktails 

Route::get(
    '/cocktails',
    [CocktailsController::class, 'index']
)->name('cocktails.index');

Route::post(    
    '/cocktails',
    [CocktailsController::class, 'create']
)->name('cocktails.create');


Route::get(
    '/cocktails/{id}',
    [CocktailsController::class, 'delete']
)->name('cocktails.delete');

Route::put(
    '/cocktails/{id}',
    [CocktailsController::class, 'add']
)->name('cocktails.add');

//admin 

Auth::routes();

