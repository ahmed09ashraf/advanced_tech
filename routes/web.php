<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('login');
// });


Auth::routes();

/* Companies Routes*/ 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create',[CompanyController::class , 'create'])->name('company.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('company.store');
Route::get('/companies/{company}',[CompanyController::class , 'show'])->name('company.show');
Route::get('/companies/edit',[CompanyController::class , 'edit'])->name('company.edit');
Route::post('/companies/update',[CompanyController::class , 'update'])->name('company.update');
Route::delete('/companies/delete/{company}',[CompanyController::class , 'delete'])->name('company.delete');

// ===============================================================================================

/* Employees Routes*/ 
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class , 'create'])->name('employee.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employees/{employee}',[EmployeeController::class , 'show'])->name('employee.show');
Route::get('/employees/edit',[EmployeeController::class , 'edit'])->name('employee.edit');
Route::post('/employees/update',[EmployeeController::class , 'update'])->name('employee.update');
Route::delete('/employees/delete/{employee}',[EmployeeController::class , 'delete'])->name('employee.delete');
