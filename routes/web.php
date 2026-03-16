<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Maintenance page (always accessible)
Route::get('/mantenimiento', [SurveyController::class, 'maintenance'])->name('survey.maintenance');
Route::get('/thanks', [SurveyController::class, 'thanks'])->name('survey.thanks');

// Public survey routes (blocked when maintenance mode is on)
Route::middleware(\App\Http\Middleware\CheckMaintenanceMode::class)->group(function () {
    Route::get('/', [SurveyController::class, 'welcome'])->name('survey.index');
    Route::get('/encuesta', [SurveyController::class, 'index'])->name('survey.form');
    Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected dashboard routes
Route::middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/export/excel', [DashboardController::class, 'exportExcel'])->name('dashboard.export.excel');
    Route::get('/dashboard/export/csv', [DashboardController::class, 'exportCsv'])->name('dashboard.export.csv');
    Route::get('/dashboard/configuracion', [DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::post('/dashboard/configuracion', [DashboardController::class, 'updateSettings'])->name('dashboard.settings.update');
});