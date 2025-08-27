<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\UserController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

Route::get('/', function () {
    return view('auth.login'); // Breeze login page
});


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
        Route::get('dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');

        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('admin.setting');
        Route::post('settings/store', [SettingController::class, 'store'])->name('admin.setting.store');

        // Profile
        Route::get('profile',[AdminUserController::class,'profile'])->name('admin.profile');
        Route::post('profile',[AdminUserController::class,'profileUpdate'])->name('admin.upadte');

        // Users
        Route::resource('user', UserController::class);

        // Admin users
        Route::resource('admin-user', AdminUserController::class);

        // Logs
        Route::get('logs', [LogViewerController::class, 'index']);
});

require __DIR__.'/auth.php';
