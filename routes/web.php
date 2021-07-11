<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentialUnitController;
use App\Http\Controllers\VisitorController;

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
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('residentialunits', ResidentialUnitController::class)->middleware('auth');
Route::resource('visitors', VisitorController::class)->middleware('auth');


require __DIR__ . '/auth.php';
