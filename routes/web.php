<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

// Route HomeController
Route::get('/',[HomeController::class , 'index']);
Route::get('/redirect',[HomeController::class , 'redirect']);
Route::post('/reservation',[HomeController::class , 'reservation']);
Route::post('/add_cart/{id}',[HomeController::class , 'add_cart']);
Route::get('/show_cart/{id}',[HomeController::class , 'show_cart']);
Route::get('/remove/{id}',[HomeController::class , 'remove']);
Route::post('/order_confirm',[HomeController::class , 'order_confirm']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route AdminController
Route::get('/users',[AdminController::class , 'user']);
Route::get('/delete_user/{id}',[AdminController::class , 'delete_user']);
Route::get('/food_menu',[AdminController::class , 'food_menu']);
Route::post('/upload_food',[AdminController::class , 'upload_food']);
Route::get('/delete_menu/{id}',[AdminController::class , 'delete_menu']);
Route::get('/update_view/{id}',[AdminController::class , 'update_view']);
Route::post('/update/{id}',[AdminController::class , 'update']);
Route::get('/view_reservation',[AdminController::class , 'view_reservation']);
Route::get('/view_chef',[AdminController::class , 'view_chef']);
Route::post('/upload_chef',[AdminController::class , 'upload_chef']);
Route::get('/update_chef/{id}',[AdminController::class , 'update_chef']);
Route::post('/edit_chef/{id}',[AdminController::class , 'edit_chef']);
Route::get('/delete_chef/{id}',[AdminController::class , 'delete_chef']);
Route::get('/orders',[AdminController::class , 'orders']);
Route::post('/search',[AdminController::class , 'search']);


require __DIR__.'/auth.php';
