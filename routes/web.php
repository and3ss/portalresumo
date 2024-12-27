<?php

use App\Http\Controllers\PostListController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', PostListController::class)->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
