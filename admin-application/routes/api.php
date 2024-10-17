<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
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

Route::apiResource('/branches', BranchController::class);
Route::get('/nearby', [BranchController::class, 'showNearby']);

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World!'], 200);
});

Route::get('/get-user', [UserController::class, 'getAllUser']);

// show all atm location
Route::get('/atm/showAll', [BranchController::class, 'showAllATM']);

// get filtered branch
Route::get('/office/filter', [BranchController::class, 'getFilteredBranch']);
Route::get('/atm/filter', [BranchController::class, 'getFilteredATM']);

// show all review
Route::get('/review/showAll', [RatingController::class, 'showAllRating']);
Route::get('/office/{id}/review', [RatingController::class, 'showAllRatingByBranch']);

// post review
Route::post('/office/{id}/review', [RatingController::class, 'storeRating']);

// increase and decrease branch queue
Route::post('/branches/{id}/increment-queue', [BranchController::class, 'incrementQueue']);
Route::post('/branches/{id}/decrement-queue', [BranchController::class, 'decrementQueue']);
