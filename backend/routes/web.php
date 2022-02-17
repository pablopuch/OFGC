<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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

Route::resource('shedules', App\Http\Controllers\SheduleController::class);

Route::resource('rooms', App\Http\Controllers\RoomController::class);

Route::resource('composers', App\Http\Controllers\ComposerController::class);

Route::resource('directors', App\Http\Controllers\DirectorController::class);

Route::resource('soloists', App\Http\Controllers\SoloistController::class);

Route::resource('type_shedules', App\Http\Controllers\TypeSheduleController::class);

Route::resource('playlists', App\Http\Controllers\PlaylistController::class);

Route::resource('seasons', App\Http\Controllers\SeasonController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/generate-pdf', [App\Http\Controllers\DirectorController::class, 'getAllDirectors']);
