<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/area', [RestaurantController::class, 'searchByArea'])->name('restaurants.area');
Route::get('/Genre', [RestaurantController::class, 'searchByGenre'])->name('restaurants.searchByGenre');


Route::middleware('auth')->group(function(){
    Route::get('/detail/{restaurant_id}', [RestaurantController::class, 'detail'])->name('restaurant.detail');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/done', [DoneController::class, 'index'])->name('done');
    Route::post('/done', [DoneController::class, 'index'])->name('done');
    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');
    Route::post('/{restaurant_id}/favorite', [FavoriteController::class, 'favorites'])->name('favorite');
    Route::delete('/{restaurant_id}/favorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});
