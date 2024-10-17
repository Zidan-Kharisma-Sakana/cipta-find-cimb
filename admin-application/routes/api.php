<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/branchs', BranchController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World!'], 200);
});

Route::get('/get-user', [UserController::class, 'getAllUser']);

// show all branch location
Route::get('/branchs', [BranchController::class, 'showAll']);