<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Http\Controllers\ContactsApiController;

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

Route::get('/contacts', [ContactsApiController::class, 'index']);

Route::get('/contacts/{id}', [ContactsApiController::class, 'getOne']);

Route::post('/contacts', [ContactsApiController::class, 'store']);

Route::put('/contacts/{id}', [ContactsApiController::class, 'update']);

Route::delete('/contacts/{id}', [ContactsApiController::class, 'delete']);