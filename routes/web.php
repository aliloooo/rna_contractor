<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => true]);


Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // reservation
    Route::resource('reservation', \App\Http\Controllers\Admin\ReservationController::class)->only(['index', 'destroy']);
    // project packages
    Route::resource('project_packages', \App\Http\Controllers\Admin\ProjectPackageController::class)->except('show');
    Route::resource('project_packages.galleries', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'index','show']);
    // categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    // blogs
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class)->except('show');
    // profile
    Route::resource('users', \App\Http\Controllers\UserController::class)->only(['index', 'destroy']);
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

// project packages
Route::get('project-packages',[\App\Http\Controllers\ProjectPackageController::class, 'index'])->name('project_package.index');
Route::get('project-packages/{project_package:slug}',[\App\Http\Controllers\ProjectPackageController::class, 'show'])->name('project_package.show');
// blogs
Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('blogs/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('blogs/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');
// contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');

// reservation
Route::get('reservation',[\App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');
Route::post('reservation', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');