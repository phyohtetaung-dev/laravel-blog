<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Route;

// Admin
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // AdminController
    Route::controller(AdminController::class)->group(function () {
        Route::get('', fn () => view('admin.index'))->name('index');
        Route::get('logout', 'logout')->name('logout');
        Route::get('profile', 'profile')->name('profile');
        Route::get('edit-profile', 'editProfile')->name('edit-profile');
        Route::put('edit-profile/{user}', 'updateProfile')->name('update-profile');
        Route::get('change-password', 'changePassword')->name('change-password');
        Route::put('update-password/{user}', 'updatePassword')->name('update-password');
    });

    // HomeSliderController
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('home-slider', 'index')->name('home-slider');
        Route::get('home-slider/create', 'create')->name('create-home-slider');
        Route::post('home-slider', 'store')->name('store-home-slider');
        Route::get('home-slider/edit/{homeSlider}', 'edit')->name('edit-home-slider');
        Route::put('home-slider/{homeSlider}', 'update')->name('update-home-slider');
        Route::delete('home-slider/{homeSlider}', 'destroy')->name('delete-home-slider');

        Route::put('home-slider/{homeSlider}/update-status', 'updateStatus')->name('update-home-slider-status');
    });
});

// Front
Route::get('/', fn () => view('front.index', [
    'homeSlider' => HomeSlider::where('status', HomeSlider::STATUS['active'])->first(),
]));

require __DIR__.'/auth.php';
