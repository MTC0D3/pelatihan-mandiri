<?php

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Member\CetakController;


use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Member\ProfileController as MemberProfileController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\MyPendaftaranController as MemberPendaftaranController;

// home route
Route::get('/', HomeController::class)->name('home');


 // admin user route
    Route::controller(CustomRegisterController::class)->as('register.')->group(function(){
        Route::get('/register', 'showStep1Form')->name('step1');
        Route::post('/register','postStep1')->name('step1.post');

        Route::get('/register/tahap2','showStep2Form')->name('step2');
        Route::post('/register/tahap2', 'postStep2')->name('step2.post');

        Route::get('/register/tahap3', 'showStep3Form')->name('step3');
        Route::post('/register/tahap3', 'postStep3')->name('step3.post');
    });



// admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    // admin dashboard route
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // admin pelatihan route
    Route::resource('/pelatihan', PelatihanController::class);

    // admin pendaftaran route
    Route::resource('/pendaftaran', PendaftaranController::class);
    
    // admin user route
    Route::controller(UserController::class)->as('user.')->group(function(){
        Route::get('/user/profile', 'profile')->name('profile');
        Route::put('/user/profile/{user}', 'profileUpdate')->name('profile.update');
        Route::put('/user/profile/password/{user}', 'profile')->name('profile.password');
    });
    Route::resource('/user', UserController::class)->only('index', 'update', 'destroy');

    // admin report route
    Route::controller(ReportController::class)->as('report.')->group(function(){
        Route::get('/report', 'index')->name('index');
        Route::get('/report/filter', 'filter')->name('filter');
        Route::get('/report/excel/{fromDate}/{toDate}', 'export_excel')->name('excel');
      });
});


// member route
Route::group(['as' => 'member.', 'prefix' => 'account', 'middleware' => ['auth', 'role:member']], function(){
    // member dashboard route
    Route::get('/dashboard', MemberDashboardController::class)->name('dashboard');

    // member profile route
    Route::controller(MemberProfileController::class)->as('profile.')->group(function(){
        Route::get('/profile', 'index')->name('index');
        Route::put('/profile/{user}', 'updateProfile')->name('update');
        Route::put('/profile/password/{user}', 'updatePassword')->name('password');
    });

    // member pendaftaran route
    Route::resource('/pendaftaran', MemberPendaftaranController::class);
});