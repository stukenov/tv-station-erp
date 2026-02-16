<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvShowController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HRM\DepartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::resource('tv_shows', TvShowController::class);
Route::resource('episodes', EpisodeController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('advertisers', AdvertiserController::class);
Route::resource('advertisements', AdvertisementController::class);
Route::resource('ratings', RatingController::class);
Route::resource('staff', StaffController::class);
Route::resource('leaves', \App\Http\Controllers\HRM\LeaveController::class);
Route::resource('performance_reviews', \App\Http\Controllers\HRM\PerformanceReviewController::class);
Route::resource('trainings', \App\Http\Controllers\HRM\TrainingController::class);
Route::resource('attendances', \App\Http\Controllers\HRM\AttendanceController::class);
Route::resource('payrolls', \App\Http\Controllers\HRM\PayrollController::class);
Route::resource('recruitments', \App\Http\Controllers\HRM\RecruitmentController::class);
Route::resource('benefits', \App\Http\Controllers\HRM\BenefitController::class);
Route::resource('employees', \App\Http\Controllers\HRM\EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('customers', CustomerController::class);
Route::resource('contacts', ContactController::class);

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('sales', SaleController::class);

Route::resource('campaigns', CampaignController::class);

Route::resource('reports', ReportController::class);

Route::resource('invoices', InvoiceController::class);

Route::resource('expenses', ExpenseController::class);

Route::resource('budgets', BudgetController::class);

Route::resource('payments', PaymentController::class);

Route::resource('taxes', TaxController::class);

Route::resource('assets', AssetController::class);

Route::resource('inventories', InventoryController::class);

Route::resource('procurements', ProcurementController::class);
