<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController as AdminBranchController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Route::get('/', function () {
    //     return view('dashboard/index');
    // })->name('dashboard.index');

    Route::resource('/branch', AdminBranchController::class);
    Route::get('/branch-data', [AdminBranchController::class, 'branchData'])->name('branch.data');

});

// Login & Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');