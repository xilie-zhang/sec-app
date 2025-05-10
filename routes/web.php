<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('pippo', CarController::class)->middleware(['auth', 'verified']);

// Route::post('cars', function () {
//     return Inertia::render('Cars');
// })->middleware(['auth', 'verified'])->name('cars');

Route::get('cars/index', [CarController::class, 'index'])->middleware(['auth', 'verified'])->name('cars.index');
Route::post('/cars', [CarController::class, 'store'])->middleware(['auth', 'verified'])->name('cars.store');
Route::get('/cars/delete/{car}', [CarController::class, 'destroy'])->middleware(['auth', 'verified'])->name('cars.destroy');
// Route::post('/cars',function(){
//     return "postato";
// });

// Route::get('cars', function () {
//     return Inertia::render('Cars');
// });


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
