<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\ProfileController;
use App\Models\Admin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FoodController; // Ensure this matches your controller name
use App\Http\Controllers\ReservationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    // Route::get('/admin/menu', function () {
    //     return Inertia::render('Admin/Menu/Menu');
    // })->name('admin.menu');
    // Route::resource('admin/menu', MenuController::class);
    Route::resource('/admin/menu', MenuController::class)->names([
        'index' => 'admin.menu.index',
        'create' => 'admin.menu.create',
        'store' => 'admin.menu.store',
        'show' => 'admin.menu.show',
        'edit' => 'admin.menu.edit',
        'update' => 'admin.menu.update',
        'destroy' => 'admin.menu.destroy',
    ]);

    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
});

require __DIR__.'/auth.php';
require __DIR__.'/AdminAuth.php';


Route::get('/dashboard', [FoodController::class, 'index'])->name('dashboard');

Route::get('/reservation', function () {
    return Inertia::render('Reservation/Reservation'); // Capital "R" matches file name
})->name('reservation');


// Reservation CRUD routes
Route::apiResource('reservations', ReserveController::class);
