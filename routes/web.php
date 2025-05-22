<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// Route untuk admin
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/adminDashboard', [SessionController::class, 'adminDashboard'])->name('adminDashboard');
});

// Route untuk user
Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/userDashboard', [SessionController::class, 'userDashboard'])->name('userDashboard');
});
