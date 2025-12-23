<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home redirect
Route::get('/', function () {
    return redirect()->route('companies.index');
});

/*
|--------------------------------------------------------------------------
| Companies Routes
|--------------------------------------------------------------------------
*/
Route::prefix('companies')->group(function () {

    Route::get('/', [CompanyController::class, 'index'])
        ->name('companies.index');

    Route::get('/create', [CompanyController::class, 'create'])
        ->name('companies.create');

    Route::post('/', [CompanyController::class, 'store'])
        ->name('companies.store');

    Route::get('/{companyId}', [CompanyController::class, 'show'])
        ->name('companies.show');

    Route::get('/{companyId}/edit', [CompanyController::class, 'edit'])
        ->name('companies.edit');

    Route::put('/{companyId}', [CompanyController::class, 'update'])
        ->name('companies.update');

    Route::delete('/{companyId}', [CompanyController::class, 'destroy'])
        ->name('companies.destroy');
});

/*
|--------------------------------------------------------------------------
| Employees Routes
|--------------------------------------------------------------------------
*/
Route::prefix('employees')->group(function () {

    Route::get('/', [EmployeeController::class, 'index'])
        ->name('employees.index');

    Route::get('/create', [EmployeeController::class, 'create'])
        ->name('employees.create');

    Route::post('/', [EmployeeController::class, 'store'])
        ->name('employees.store');

    Route::get('/{employeeId}', [EmployeeController::class, 'show'])
        ->name('employees.show');

    Route::get('/{employeeId}/edit', [EmployeeController::class, 'edit'])
        ->name('employees.edit');

    Route::put('/{employeeId}', [EmployeeController::class, 'update'])
        ->name('employees.update');

    Route::delete('/{employeeId}', [EmployeeController::class, 'destroy'])
        ->name('employees.destroy');
});
