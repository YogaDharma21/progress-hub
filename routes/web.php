<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\MemberEventController;
use App\Http\Controllers\MemberProjectController;
use App\Http\Controllers\MemberResourceController;
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
    Route::get('/', [MemberDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [MemberEventController::class, 'index'])->name('index');
        Route::get('/detail', function () {
            $event = \App\Models\Event::first();
            return $event ? redirect()->route('members.events.show', $event) : redirect()->route('members.events.index');
        });
        Route::get('/{event}', [MemberEventController::class, 'show'])->name('show');
        Route::post('/{event}/register', [MemberEventController::class, 'toggleRegistration'])->name('register');
    });

    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [MemberProjectController::class, 'index'])->name('index');
        Route::get('/detail', function () {
            $project = \App\Models\Project::first();
            return $project ? redirect()->route('members.projects.show', $project) : redirect()->route('members.projects.index');
        });
        Route::get('/{project}', [MemberProjectController::class, 'show'])->name('show');
    });

    Route::prefix('resources')->name('resources.')->group(function () {
        Route::get('/', [MemberResourceController::class, 'index'])->name('index');
        Route::get('/detail', function () {
            $resource = \App\Models\Resource::first();
            return $resource ? redirect()->route('members.resources.show', $resource) : redirect()->route('members.resources.index');
        });
        Route::get('/{resource}', [MemberResourceController::class, 'show'])->name('show');
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
