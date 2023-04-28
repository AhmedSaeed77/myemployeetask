<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeAttendanceController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/check', [AdminController::class, 'check'])->name('login');
//Route::any('/login2', [AdminController::class, 'login'])->name('alogin');
//Route::any('/logout', [AdminController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/index', function () {return view('index');})->name('index');

    Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::get('/add', [EmployeeController::class, 'add'])->name('add');
        Route::post('/store', [EmployeeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('/update', [EmployeeController::class, 'update'])->name('update');
        Route::post('/delete', [EmployeeController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'work', 'as' => 'work.'], function () {
        Route::get('/', [WorkController::class, 'index'])->name('index');
        Route::get('/add', [WorkController::class, 'add'])->name('add');
        Route::post('/store', [WorkController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'employeeattendace', 'as' => 'employeeattendace.'], function () {
        Route::get('/', [EmployeeAttendanceController::class, 'index'])->name('index');
        // Route::get('/add', [EmployeeController::class, 'add'])->name('add');
        // Route::post('/store', [EmployeeController::class, 'store'])->name('store');
        // Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
        // Route::post('/update', [EmployeeController::class, 'update'])->name('update');
        // Route::post('/delete', [EmployeeController::class, 'delete'])->name('delete');
    });

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
