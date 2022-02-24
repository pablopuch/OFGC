<?php

use Illuminate\Support\Facades\Route;
use App\Events\hello;

  


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'auth',

], function ($router) {

    Route::get('/seasons',  [App\Http\Controllers\SeasonController::class, 'index']);
    Route::post('/seasons', [App\Http\Controllers\SeasonController::class, 'store']);
    Route::put('/seasons/{id}', [App\Http\Controllers\SeasonController::class, 'update']);
    Route::delete('/seasons/{id}', [App\Http\Controllers\SeasonController::class, 'destroy']);

    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/projects/{id}', [App\Http\Controllers\ProjectController::class, 'show']);
    Route::get('/project/{published}', [App\Http\Controllers\ProjectController::class, 'public']);
    Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store']);
    Route::put('/projects/{id}', [App\Http\Controllers\ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [App\Http\Controllers\ProjectController::class, 'destroy']);

    Route::get('/directors', [App\Http\Controllers\DirectorController::class, 'index']);
    Route::post('/directors', [App\Http\Controllers\DirectorController::class, 'store']);
    Route::put('/directors/{id}', [App\Http\Controllers\DirectorController::class, 'update']);
    Route::delete('/directors/{id}', [App\Http\Controllers\DirectorController::class, 'destroy']);

    Route::get('/directorProjects', [App\Http\Controllers\DirectorProjectController::class, 'index']);
    Route::post('/directorProjects', [App\Http\Controllers\DirectorProjectController::class, 'store']);
    Route::get('/directorProjects/project/{id}', [App\Http\Controllers\DirectorProjectController::class, 'showByProjectId']);
    Route::put('/directorProjects/{id}', [App\Http\Controllers\DirectorProjectController::class, 'update']);
    Route::delete('/directorProjects/{id}', [App\Http\Controllers\DirectorProjectController::class, 'destroy']);

    Route::get('/composers', [App\Http\Controllers\ComposerController::class, 'index']);
    Route::post('/composers', [App\Http\Controllers\ComposerController::class, 'store']);
    Route::put('/composers/{id}', [App\Http\Controllers\ComposerController::class, 'update']);
    Route::delete('/composers/{id}', [App\Http\Controllers\ComposerControllerclear::class, 'destroy']);

    Route::get('/soloists', [App\Http\Controllers\SoloistController::class, 'index']);
    Route::post('/soloists', [App\Http\Controllers\SoloistController::class, 'store']);
    Route::put('/soloists/{id}', [App\Http\Controllers\SoloistController::class, 'update']);
    Route::delete('/soloists/{id}', [App\Http\Controllers\SoloistController::class, 'destroy']);

    Route::get('/solistProjects', [App\Http\Controllers\SolistProjectController::class, 'index']);
    Route::get('/solistProjects/project/{id}', [App\Http\Controllers\SolistProjectController::class, 'showByProjectId']);
    Route::post('/solistProjects', [App\Http\Controllers\SolistProjectController::class, 'store']);
    Route::put('/solistProjects/{id}', [App\Http\Controllers\SolistProjectController::class, 'update']);
    Route::delete('/solistProjects/{id}', [App\Http\Controllers\SolistProjectController::class, 'destroy']);

    Route::get('/shedules', [App\Http\Controllers\SheduleController::class, 'index']);
    Route::get('/shedules/{id}', [App\Http\Controllers\SheduleController::class, 'show']);
    Route::get('/shedules/project/{id}', [App\Http\Controllers\SheduleController::class, 'showByProjectId']);
    Route::post('/shedules', [App\Http\Controllers\SheduleController::class, 'store']);
    Route::put('/shedules/{id}', [App\Http\Controllers\SheduleController::class, 'update']);
    Route::delete('/shedules/{id}', [App\Http\Controllers\SheduleController::class, 'destroy']);

    Route::get('/type_shedules', [App\Http\Controllers\TypeSheduleController::class, 'index']);
    Route::post('/type_shedules', [App\Http\Controllers\TypeSheduleController::class, 'store']);
    Route::put('/type_shedules/{id}', [App\Http\Controllers\TypeSheduleController::class, 'update']);
    Route::delete('/type_shedules/{id}', [App\Http\Controllers\TypeSheduleController::class, 'destroy']);

    Route::get('/works', [App\Http\Controllers\WorkController::class, 'index']);
    Route::post('/works', [App\Http\Controllers\WorkController::class, 'store']);
    Route::put('/works/{id}', [App\Http\Controllers\WorkController::class, 'update']);
    Route::delete('/works/{id}', [App\Http\Controllers\WorkController::class, 'destroy']);

    Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'index']);
    Route::post('/playlists', [App\Http\Controllers\PlaylistController::class, 'store']);
    Route::put('/playlists/{id}', [App\Http\Controllers\PlaylistController::class, 'update']);
    Route::delete('/playlists/{id}', [App\Http\Controllers\PlaylistController::class, 'destroy']);

    Route::get('/controlVersions', [App\Http\Controllers\ControlVersionController::class, 'index']);
    Route::post('/controlVersions', [App\Http\Controllers\ControlVersionController::class, 'store']);
    Route::put('/controlVersions/{id}', [App\Http\Controllers\ControlVersionController::class, 'update']);
    Route::delete('/controlVersions/{id}', [App\Http\Controllers\ControlVersionController::class, 'destroy']);

    Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'index']);
    Route::post('/rooms', [App\Http\Controllers\RoomController::class, 'store']);
    Route::put('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'update']);
    Route::delete('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'destroy']);

});

Route::get('/generate-pdf', [App\Http\Controllers\DirectorController::class, 'getAllDirectors']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
});

Route::get('/tiburcio', [App\Http\Controllers\DirectorController::class, 'pablo']);