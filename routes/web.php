<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;

// Redirect to security login if not logged in
Route::get('/', function () {
    return redirect()->route('security.login');
});

// Security routes
Route::get('security/login', [SecurityController::class, 'showLoginForm'])->name('security.login');
Route::post('security/login', [SecurityController::class, 'login'])->name('security.login.post');
Route::post('security/logout', [SecurityController::class, 'logout'])->name('security.logout');

// Group all routes that require security login under middleware
Route::middleware('auth:security')->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor.index');
    Route::get('/visitor/create', [VisitorController::class, 'create'])->name('visitor.create');
    Route::post('/visitor', [VisitorController::class, 'store'])->name('visitor.store');
    Route::post('/visitor/checkout/{id}', [VisitorController::class, 'checkout'])->name('visitor.checkout');

    Route::get('/staff/check-in', [StaffController::class, 'showCheckInForm'])->name('staff.check-in');
    Route::post('/staff/check-in', [StaffController::class, 'checkIn'])->name('staff.check-in.post');
    Route::get('/staff/check-out', [StaffController::class, 'showCheckOutForm'])->name('staff.check-out');
    Route::post('/staff/check-out', [StaffController::class, 'checkOut'])->name('staff.check-out.post');
    Route::get('/staff/checked-in-today', [StaffController::class, 'checkedInToday'])->name('staff.checked-in-today');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('visitors', [AdminController::class, 'showVisitors'])->name('admin.visitors');
        Route::get('staff', [AdminController::class, 'showStaff'])->name('admin.staff');
        Route::get('export/visitors', [AdminController::class, 'exportVisitors'])->name('admin.export_visitors');
        Route::get('export/staff', [AdminController::class, 'exportStaff'])->name('admin.export_staff');
        Route::post('filter_visitors', [AdminController::class, 'filterVisitors'])->name('admin.filter_visitors');
        Route::post('filter_staff', [AdminController::class, 'filterStaff'])->name('admin.filter_staff');
        Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    });

    Route::get('visitorsreport', [AdminController::class, 'showVisitorsReport'])->name('admin.visitorsreport');
    Route::get('staffreport', [AdminController::class, 'showStaffReport'])->name('admin.staffreport');
    Route::get('live-visitors-count', 'AdminController@getLiveVisitorsCount')->name('admin.live_visitors_count');
    Route::get('live-staff-count', 'AdminController@getLiveStaffCount')->name('admin.live_staff_count');
    Route::get('checked_in_today', [AdminController::class, 'checkedInToday'])->name('admin.checked_in_today');
    Route::get('staff_report', [AdminController::class, 'staffReport'])->name('admin.staff_report');
    Route::get('visitors_report', [AdminController::class, 'visitorsReport'])->name('admin.visitors_report');
    Route::get('visitors_in_today', [AdminController::class, 'visitors_in_today'])->name('admin.visitors_in_today');
});
