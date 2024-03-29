<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('admin', function () {
    return '<h1>Hello Admin</h1>';
})->middleware(['auth', 'verified', 'role:admin']);

Route::get('murid', function () {
    return '<h1>Hello Admin</h1>';
})->middleware(['auth', 'verified', 'role:murid']);

Route::get('guru', function () {
    return '<h1>Hello Admin</h1>';
})->middleware(['auth', 'verified', 'role:guru']);

Route::get('gurupiket', function () {
    return '<h1>Hello Admin</h1>';
})->middleware(['auth', 'verified', 'role:gurupiket']);

Route::get('tu', function () {
    return '<h1>Hello Admin</h1>';
})->middleware(['auth', 'verified', 'role:tu']);

Route::get('kepsek', function () {
    return '<h1>Hello Admin</h1>';
})->middleware(['auth', 'verified', 'role:kepsek']);

Route::get('kurikulum', function () {
    return '<h1>Hello Admin</h1>';
})->middleware(['auth', 'verified', 'role:kurikulum']);

require __DIR__.'/auth.php';
