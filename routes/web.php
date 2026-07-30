<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::prefix('members')->name('members.')->group(function () {
    Route::get('/dashboard', function () {
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', function () {
            return view('admin.events.index');
        })->name('index');

        Route::get('/create', function () {
            return view('admin.events.create');
        })->name('create');

        Route::get('/edit', function () {
            return view('admin.events.edit');
        })->name('edit');
    });

    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', function () {
            return view('admin.projects.index');
        })->name('index');

        Route::get('/create', function () {
            return view('admin.projects.create');
        })->name('create');

        Route::get('/edit', function () {
            return view('admin.projects.edit');
        })->name('edit');
    });

    Route::prefix('resources')->name('resources.')->group(function () {
        Route::get('/', function () {
            return view('admin.resources.index');
        })->name('index');

        Route::get('/create', function () {
            return view('admin.resources.create');
        })->name('create');

        Route::get('/edit', function () {
            return view('admin.resources.edit');
        })->name('edit');
    });
});
