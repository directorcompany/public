<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
// use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [CityController::class, 'index'])->name('home');
Route::get('/{city}', [CityController::class, 'show'])->where('city','[A-za-z-0-9-]+')->name('city.show');
Route::get('/{city}/about', [CityController::class, 'about'])->name('about');
Route::get('/{city}/news', [CityController::class, 'news'])->name('news');
Route::get('/city/store',[CityController::class,'form']);
Route::post('/city/store',[CityController::class,'add'])->name('store');
Route::delete('/city/{city}',[CityController::class,'delete'])->name('delete');
