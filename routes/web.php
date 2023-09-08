<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Member\CetakController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PelatihanController;


use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Member\ProfileController as MemberProfileController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\MyPendaftaranController as MemberPendaftaranController;


// home route
Route::get('/', HomeController::class)->name('home');

// admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    // admin dashboard route
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('/pelatihan', PelatihanController::class);

    Route::resource('/pendaftaran', PendaftaranController::class);

    // admin user route
    Route::controller(UserController::class)->as('user.')->group(function(){
        Route::get('/user/profile', 'profile')->name('profile');
        Route::put('/user/profile/{user}', 'profileUpdate')->name('profile.update');
        Route::put('/user/profile/password/{user}', 'profile')->name('profile.password');
    });
    Route::resource('/user', UserController::class)->only('index', 'update', 'destroy');

    Route::controller(ReportController::class)->as('report.')->group(function(){
        Route::get('/report', 'index')->name('index');
        Route::get('/report/filter', 'filter')->name('filter');
        Route::get('/report/pdf/{fromDate}/{toDate}', 'pdf')->name('pdf');
      });
});

// member route
Route::group(['as' => 'member.', 'prefix' => 'account', 'middleware' => ['auth', 'role:member']], function(){
    // member dashboard route
    Route::get('/dashboard', MemberDashboardController::class)->name('dashboard');

    Route::controller(MemberProfileController::class)->as('profile.')->group(function(){
        Route::get('/profile', 'index')->name('index');
        Route::put('/profile/{user}', 'updateProfile')->name('update');
        Route::put('/profile/password/{user}', 'updatePassword')->name('password');
    });

    Route::resource('/pendaftaran', MemberPendaftaranController::class);
});