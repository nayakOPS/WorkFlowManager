<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{MemberController, AuthController, TaskController, ProjectController, UserController};

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

    // User routes
    Route::apiResource('/users', UserController::class);

    // Member routes
    Route::prefix('members')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('members.index');
        Route::post('/', [MemberController::class, 'store'])->name('members.store');
        Route::get('/{member}', [MemberController::class, 'show'])->name('members.show');
        Route::put('/{member}', [MemberController::class, 'update'])->name('members.update');
        Route::delete('/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    });

    // Organization routes


    // Project routes
    Route::prefix('projects')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('projects.index');
        Route::post('/', [MemberController::class, 'store'])->name('projects.store');
        Route::get('/{project}', [MemberController::class, 'show'])->name('projects.show');
        Route::put('/{project}', [MemberController::class, 'update'])->name('projects.update');
        Route::delete('/{project}', [MemberController::class, 'destroy'])->name('projects.destroy');
    });

    // Task routes
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/{task}', [TaskController::class, 'show'])->name('tasks.show');
        Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });
});
