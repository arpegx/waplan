<?php

use App\Http\Controllers\PlantController;
use App\Livewire\Plant\PlantTable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get( "/", PlantTable::class)->name("plant.table");
Route::get( "/plants/create", [PlantController::class,"create"])->name("plants.create");
Route::post("/plants", [PlantController::class,"store"])->name("plants.store");
Route::get( "/plants/{plant}", [PlantController::class,"show"])->name("plants.show");
Route::get( "/plants/{plant}/edit", [PlantController::class,"edit"])->name("plants.edit");
Route::put( "/plants/{plant}", [PlantController::class,"update"])->name("plants.update");

require __DIR__.'/auth.php';
