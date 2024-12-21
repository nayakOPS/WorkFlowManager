<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\{MemberController, AuthController};
use App\Http\Controllers\UserController;

// Public Routes
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// Protected Routes with Sanctum Middleware
Route::middleware(['auth:sanctum'])->group(function () {
    // Auth-related routes
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Member routes
    Route::prefix('members')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('members.index');
        Route::post('/', [MemberController::class, 'store'])->name('members.store');
        Route::get('/{member}', [MemberController::class, 'show'])->name('members.show');
        Route::put('/{member}', [MemberController::class, 'update'])->name('members.update');
        Route::delete('/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    });

    Route::apiResource('/users', UserController::class);

});
