<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminSubmissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Member\EventSubmissionController;
use App\Http\Controllers\Member\ProjectSubmissionController;
use App\Http\Controllers\Member\ResourceSubmissionController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\MemberEventController;
use App\Http\Controllers\MemberProjectController;
use App\Http\Controllers\MemberResourceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('members')->name('members.')->group(function () {
    Route::get('/', [MemberDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [MemberEventController::class, 'index'])->name('index');
        Route::get('/detail', [MemberEventController::class, 'detail'])->name('detail');
        Route::get('/{event}', [MemberEventController::class, 'show'])->name('show');
        Route::post('/{event}/register', [MemberEventController::class, 'toggleRegistration'])->name('register');
    });

    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [MemberProjectController::class, 'index'])->name('index');
        Route::get('/detail', [MemberProjectController::class, 'detail'])->name('detail');
        Route::get('/{project}', [MemberProjectController::class, 'show'])->name('show');
    });

    Route::prefix('resources')->name('resources.')->group(function () {
        Route::get('/', [MemberResourceController::class, 'index'])->name('index');
        Route::get('/detail', [MemberResourceController::class, 'detail'])->name('detail');
        Route::get('/{resource}', [MemberResourceController::class, 'show'])->name('show');
    });

    Route::prefix('submissions')->name('submissions.')->group(function () {
        Route::prefix('events')->name('events.')->group(function () {
            Route::get('/create', [EventSubmissionController::class, 'create'])->name('create');
            Route::post('/', [EventSubmissionController::class, 'store'])->name('store');
            Route::get('/{event}/edit', [EventSubmissionController::class, 'edit'])->name('edit');
            Route::put('/{event}', [EventSubmissionController::class, 'update'])->name('update');
            Route::delete('/{event}', [EventSubmissionController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('projects')->name('projects.')->group(function () {
            Route::get('/create', [ProjectSubmissionController::class, 'create'])->name('create');
            Route::post('/', [ProjectSubmissionController::class, 'store'])->name('store');
            Route::get('/{project}/edit', [ProjectSubmissionController::class, 'edit'])->name('edit');
            Route::put('/{project}', [ProjectSubmissionController::class, 'update'])->name('update');
            Route::delete('/{project}', [ProjectSubmissionController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('resources')->name('resources.')->group(function () {
            Route::get('/create', [ResourceSubmissionController::class, 'create'])->name('create');
            Route::post('/', [ResourceSubmissionController::class, 'store'])->name('store');
            Route::get('/{resource}/edit', [ResourceSubmissionController::class, 'edit'])->name('edit');
            Route::put('/{resource}', [ResourceSubmissionController::class, 'update'])->name('update');
            Route::delete('/{resource}', [ResourceSubmissionController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');

    Route::resource('events', EventController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('resources', ResourceController::class);

    Route::prefix('submissions')->name('submissions.')->group(function () {
        Route::get('/', [AdminSubmissionController::class, 'index'])->name('index');
        Route::get('/{submission}', [AdminSubmissionController::class, 'show'])->name('show');
        Route::patch('/{submission}/approve', [AdminSubmissionController::class, 'approve'])->name('approve');
        Route::patch('/{submission}/reject', [AdminSubmissionController::class, 'reject'])->name('reject');
    });
});
