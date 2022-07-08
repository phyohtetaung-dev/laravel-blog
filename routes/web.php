<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Admin
Route::middleware('auth')->controller(AdminController::class)->group(function () {
    Route::get('/admin', fn() => view('admin.index'))->name('admin.index');
    Route::get('/admin/logout', 'logout')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit-profile', 'editProfile')->name('admin.edit-profile');
    Route::put('/admin/edit-profile/{user}', 'updateProfile')->name('admin.update-profile');
    Route::get('/admin/change-password', 'changePassword')->name('admin.change-password');
    Route::put('/admin/update-password/{user}', 'updatePassword')->name('admin.update-password');
});

// Front
Route::get('/', fn () => view('front.index'));

require __DIR__.'/auth.php';
