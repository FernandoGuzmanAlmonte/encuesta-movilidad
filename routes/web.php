<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\DashboardController;

// Public survey routes
Route::get('/', [SurveyController::class, 'index'])->name('survey.index');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/thanks', [SurveyController::class, 'thanks'])->name('survey.thanks');

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/export/excel', [DashboardController::class, 'exportExcel'])->name('dashboard.export.excel');
Route::get('/dashboard/export/csv', [DashboardController::class, 'exportCsv'])->name('dashboard.export.csv');
