<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AircraftController;
use App\Http\Livewire\ShowAirports;
use App\Http\Controllers\AirportController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum', 'verified')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'aircraft' => AircraftController::class,
    ]);

    Route::get('/airport', ShowAirports::class)->name('airport.index');
    Route::get('/airport/{airport}', [AirportController::class, 'show'])->name('airport.show');
    
});
