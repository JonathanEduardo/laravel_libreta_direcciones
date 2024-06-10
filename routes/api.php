<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/details/{id}', [ContactController::class, 'detailsAdress']);
Route::post('/contact/add', [ContactController::class, 'addContact']);  // guardar una direccion nueva
Route::post('/addresses', [ContactController::class, 'addAddress']);  // guardar una direccion nueva
Route::post('/phones', [ContactController::class, 'addPhone']);  // guardar una direccion nueva
Route::post('/emails', [ContactController::class, 'addEmail']);  // guardar una direccion nueva

Route::put('/addresses/update', [ContactController::class, 'updateAddress']);  // guardar una direccion nueva
Route::put('/phones/update/{id}', [ContactController::class, 'updatePhone']);  // guardar una direccion nueva
Route::put('/emails/update', [ContactController::class, 'updateEmail']);  // guardar una direccion nueva
