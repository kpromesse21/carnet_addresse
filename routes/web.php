<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('house/',[HouseController::class,'index'])->name('house_index');
    Route::get('house/create',[HouseController::class,'create'])->name('house_create');
    Route::Post('house/create',[HouseController::class,'store'])->name('house_store');
    Route::get('contact/create',[ContactController::class,'create'])->name('contact_create');
    Route::Post('contact/store',[ContactController::class,'store'])->name('contact_store');
    
    
});

require __DIR__.'/auth.php';
