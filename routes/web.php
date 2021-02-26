<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AELoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;


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

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/registered',[AELoginController::class, "create"]);
Route::post('/dashboard',[AELoginController::class, "auth"])->name('dashboard');
  Route::group(["middleware"=>'check'], function (){
  Route::get('/department',[DepartmentController::class, 'show'])->middleware("emp_role");
  Route::get('/add_department', function () {
    return view('add_department');})->middleware("emp_role");
Route::post('/department_submit',[DepartmentController::class, 'create'])->middleware("emp_role");
Route::get('/Edit',[DepartmentController::class, 'edit'])->middleware("emp_role");
Route::post('/update',[DepartmentController::class, 'update'])->middleware("emp_role" );
Route::get('/delete_department',[DepartmentController::class, 'destroy'])->middleware("emp_role");
Route::get('/logout',[AELoginController::class, 'index']);
Route::get('/dashboard',[LeaveController::class, 'index']);
Route::get('add_leave', function(){
  return view('add_leave');
})->middleware("admin_role");
  Route::post('/change_status' ,[LeaveController::class, 'update']);
  

Route::post('/leave_submit',[LeaveController::class, 'create'])->middleware("admin_role");
Route::get("/delete_leave",[LeaveController::class,'destroy']);
  
});

