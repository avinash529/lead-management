<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Leads
    Route::post('leads/import', [LeadController::class, 'import'])->name('leads.import');
    Route::get('leads/export', [LeadController::class, 'export'])->name('leads.export');

    Route::get('leads/{lead}/history', [LeadController::class, 'history'])
        ->name('leads.history');

    Route::delete('leads/bulk-delete', [LeadController::class, 'bulkDelete'])
        ->name('leads.bulkDelete');

    Route::resource('leads', LeadController::class);

    // Admin user management
    Route::get('admin/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])
        ->name('admin.users.edit');

    Route::put('admin/users/{user}', [UserController::class, 'update'])
        ->name('admin.users.update');
});

require __DIR__ . '/auth.php';
