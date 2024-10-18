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

// Arahkan '/' ke login atau dashboard tergantung status autentikasi
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('branch.index'); // Ubah sesuai halaman dashboard kamu
    } else {
        return redirect()->route('login');
    }
});

Route::get('/home', function () {
    return redirect()->route('branch.index'); // Ubah sesuai halaman dashboard kamu
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/branch', AdminBranchController::class);
    Route::get('/branch-data', [AdminBranchController::class, 'branchData'])->name('branch.data');
});
