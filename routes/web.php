<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('members')->name('members.')->group(function () {
    Route::get('/', function () {
        return view('members.dashboard');
    })->name('dashboard');

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', function () {
            return view('members.events.index');
        })->name('index');

        Route::get('/detail', function () {
            return view('members.events.show');
        })->name('show');
    });

    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', function () {
            return view('members.projects.index');
        })->name('index');

        Route::get('/detail', function () {
            return view('members.projects.show');
        })->name('show');
    });

    Route::prefix('resources')->name('resources.')->group(function () {
        Route::get('/', function () {
            return view('members.resources.index');
        })->name('index');

        Route::get('/detail', function () {
            return view('members.resources.show');
        })->name('show');
    });
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::resource('events', EventController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('resources', ResourceController::class);
});
