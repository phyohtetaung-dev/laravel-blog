<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('admin.index'))->middleware('auth');

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'logout')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit-profile', 'editProfile')->name('admin.edit-profile');
    Route::put('/admin/edit-profile/{user}', 'updateProfile')->name('admin.update-profile');
    Route::get('/admin/change-password', 'changePassword')->name('admin.change-password');
    Route::put('/admin/update-password/{user}', 'updatePassword')->name('admin.update-password');
});

require __DIR__.'/auth.php';
