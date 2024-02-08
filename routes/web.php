<?php

use App\Http\Controllers\PlantController;
use App\Livewire\Plant\PlantTable;
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

Route::get("/", PlantTable::class)->name("plant.table");
Route::get("/plants/create", [PlantController::class,"create"])->name("plants.create");
Route::post("/plants", [PlantController::class,"store"])->name("plants.store");
Route::get("/plants/{plant}", [PlantController::class,"edit"])->name("plants.edit");
Route::put("/plants/{plant}", [PlantController::class,"update"])->name("plants.update");

// Route::view('/welcome', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

require __DIR__.'/auth.php';
