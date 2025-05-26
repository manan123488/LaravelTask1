<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;

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



Route::get('/', [CompaniesController::class, 'index'])->name('companyhome');
Route::get('/viewcompany/{id}', [CompaniesController::class, 'show'])->name('viewcompany');
Route::get('/create', [CompaniesController::class, 'create'])->name('createCompany');
Route::post('/store', [CompaniesController::class, 'store'])->name('storeCompany');
Route::get('/edit/{id}', [CompaniesController::class, 'edit'])->name('editCompany');
Route::put('/update/{id}', [CompaniesController::class, 'update'])->name('updateCompany');
Route::delete('/delete/{id}', [CompaniesController::class, 'destroy'])->name('deleteCompany');

// For Employees
Route::get('/employee', [EmployeesController::class, 'index'])->name('employeehome');
Route::get('/viewEmployee/{id}', [EmployeesController::class, 'show'])->name('viewEmployee');
Route::get('/createEmployee', [EmployeesController::class, 'create'])->name('createEmployee');
Route::post('/storeEmployee', [EmployeesController::class, 'store'])->name('storeEmployee');
Route::get('/editEmployee/{id}', [EmployeesController::class, 'edit'])->name('editEmployee');
Route::put('/updateEmployee/{id}', [EmployeesController::class, 'update'])->name('updateEmployee');
Route::delete('/deleteEmployee/{id}', [EmployeesController::class, 'destroy'])->name('deleteEmployee');