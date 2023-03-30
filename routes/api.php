<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RessourcesController;
use App\Http\Controllers\TypeRessourceController;
use App\Http\Controllers\UserController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    

/*---------------------------------------------User-------------------------------------------*/
Route::get('/user/{id}', 'App\Http\Controllers\UserController@findUser');
Route::get('/user',[UserController::class,'index']);
Route::post('/user/add',[UserController::class,'addUser']);
Route::put('/user/{id}', 'App\Http\Controllers\UserController@updateUser');
Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@deleteUser');

/*---------------------------------------------Ressources------------------------------------------*/
Route::post('/ressource/add/{id}', 'App\Http\Controllers\RessourcesController@addRessource');
//Route::post('/ressource/add',[ RessourcesController::class ,'addRessource']);
Route::put("/ressource/edit/{id}", [RessourcesController::class, 'updateRessource']);
Route::delete('/ressource/delete/{id}', [RessourcesController::class ,'deleteRessource']);
Route::get('/ressource/{id}', 'App\Http\Controllers\RessourcesController@findRessource');
Route::get('/ressource', [RessourcesController::class ,'index']);

/*--------------------------------------------Type Ressources------------------------------------------*/
Route::post('/type/add', [TypeRessourceController::class ,'addTypeRessource']);
Route::put('/type/{id}', 'App\Http\Controllers\TypeRessourceController@updateTypeRessource');
Route::delete('/type/{id}', 'App\Http\Controllers\TypeRessourceController@deleteTypeRessource');
Route::get('/type/{id}', 'App\Http\Controllers\TypeRessourceController@findTypeRessource');
Route::get('/type',[TypeRessourceController::class,'index']);

/*--------------------------------------------Reservation-------------------------------------------*/
Route::post('/reservation/add', [ReservationController::class ,'addReservation']);
Route::put('/reservation/{id}', 'App\Http\Controllers\ReservationController@updateReservation');
Route::delete('/reservation/{id}', 'App\Http\Controllers\ReservationController@deleteReservation');
Route::get('/reservation/{id}', 'App\Http\Controllers\ReservationController@findReservation');
Route::get('/reservation',[ReservationController::class,'index']);


//Route::get('/reservation/step-one', [ReservationController::class, 'stepOne'])->name('reservations.step.one');
//Route::get('/reservation/step-two', [ReservationController::class, 'stepTwo'])->name('reservations.step.two');

/*----------------------------------------admin-------------------------------------------- */
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
});