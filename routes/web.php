<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BenefitController as AdminBenefitController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\JulyFighterController as AdminJulyFighterController;
use App\Http\Controllers\Admin\VolunteerController as AdminVolunteerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\VolunteerApplicationController;
use App\Http\Controllers\Portal\AuthController as PortalAuthController;
use App\Http\Controllers\Portal\DashboardController as PortalDashboardController;
use App\Http\Controllers\Portal\ProfileController as PortalProfileController;
use App\Http\Controllers\Portal\RegistrationController as PortalRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'create'])->name('login');
    Route::post('login', [AdminAuthController::class, 'store'])->name('login.store');
    Route::post('logout', [AdminAuthController::class, 'destroy'])->name('logout');

    Route::middleware(['admin.auth'])->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('july-fighter-info', [AdminJulyFighterController::class, 'index'])->name('july-fighter.index');
        Route::get('july-fighter-info/create', [AdminJulyFighterController::class, 'create'])->name('july-fighter.create');
        Route::post('july-fighter-info', [AdminJulyFighterController::class, 'store'])->name('july-fighter.store');
        Route::get('july-fighter-info/{person}', [AdminJulyFighterController::class, 'show'])->name('july-fighter.show');
        Route::get('july-fighter-info/{person}/edit', [AdminJulyFighterController::class, 'edit'])->name('july-fighter.edit');
        Route::put('july-fighter-info/{person}', [AdminJulyFighterController::class, 'update'])->name('july-fighter.update');
        Route::post('july-fighter-info/{person}/approve', [AdminJulyFighterController::class, 'approve'])->name('july-fighter.approve');
        Route::get('search', [AdminJulyFighterController::class, 'search'])->name('search');

        Route::resource('benefits', AdminBenefitController::class);
        Route::resource('volunteers', AdminVolunteerController::class)->only(['index', 'create', 'store', 'show']);
    });
});

Route::prefix('portal')->name('portal.')->group(function () {
    Route::get('login', [PortalAuthController::class, 'create'])->name('login');
    Route::post('login', [PortalAuthController::class, 'store'])->name('login.store');
    Route::post('logout', [PortalAuthController::class, 'destroy'])->name('logout');
    Route::get('register', [PortalRegistrationController::class, 'create'])->name('register');
    Route::post('register', [PortalRegistrationController::class, 'store'])->name('register.store');

    Route::middleware(['portal.auth'])->group(function () {
        Route::get('dashboard', [PortalDashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [PortalProfileController::class, 'edit'])->name('profile');
        Route::put('profile', [PortalProfileController::class, 'update'])->name('profile.update');
        Route::get('registration', [PortalRegistrationController::class, 'edit'])->name('registration');
        Route::put('registration', [PortalRegistrationController::class, 'update'])->name('registration.update');
    });
});

Route::get('/locations/districts/{divisionId}', [LocationController::class, 'getDistricts']);
Route::get('/locations/thanas/{districtId}', [LocationController::class, 'getThanas']);
Route::get('/locations/post-offices/{thanaId}', [LocationController::class, 'getPostOffices']);
Route::get('/locations/unions/{thanaId}', [LocationController::class, 'getUnions']);

// Public Volunteer Application
Route::get('/volunteer-apply', [VolunteerApplicationController::class, 'create'])->name('volunteer.apply');
Route::post('/volunteer-apply', [VolunteerApplicationController::class, 'store'])->name('volunteer.apply.store');
