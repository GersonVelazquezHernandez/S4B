<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserAuth;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*DashBoard */
Route::get('/', HomeController::class);
/*Compañias */
Route::get('companies', [CompaniesController::class,'index'])->name('companies.index');
Route::get('companies/create', [CompaniesController::class,'create'])->name('companies.create');
Route::post('companies/', [CompaniesController::class,'store'])->name('companies.store');
Route::get('companies/{id}', [CompaniesController::class,'show'])->name('companies.show');
Route::put('companies/{company}', [CompaniesController::class,'update'])->name('companies.update');
Route::delete('companies/{company}', [CompaniesController::class,'destroy'])->name('companies.destroy');
/*Empleados*/
Route::get('employees/', [EmployeesController::class,'index'])->name('employees.index');
Route::get('employees/create', [EmployeesController::class,'create'])->name('employees.create');
Route::post('employees/', [EmployeesController::class,'store'])->name('employees.store');
Route::get('employees/{id}', [EmployeesController::class,'show'])->name('employees.show');
Route::put('employees/{employee}', [EmployeesController::class,'update'])->name('employees.update');
Route::delete('employees/{employee}', [EmployeesController::class,'destroy'])->name('employees.destroy');




/*Autenticación de usuario */
Route::post('user/',[UserAuth::class,'userLogin'])->name('user.userLogin');
Route::view('login/', 'login');


//Aún no cierra sesion
Route::get('logout/', function () {
    if(session()->has('user')){
        return redirect('/');
    }
    return view('login');
});
//Remueve la sesion
Route::get('logout/', function () {
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('login');
});

