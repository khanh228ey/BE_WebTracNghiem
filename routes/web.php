<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MonnhocController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
})->name('login');
//Users
Route::get('/list-student',[UserController::class,'getListSinhVien'])->name('listSinhVien');
Route::get('/list-teacher',[UserController::class,'getListGiaoVien'])->name('listGiaoVien');
Route::get('/add-user',[UserController::class,'addUser'])->name('addUser');
Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('editUser');
Route::post('/update-user/{id}',[UserController::class,'update'])->name('updateUser');
Route::POST('/store-user',[UserController::class,'store'])->name('storeUser');


Route::resource('monhoc', MonnhocController::class);

//login
Route::post('/login-admin',[AuthController::class,'loginAdmin'])->name('loginAdmin');
Route::post('/logout-admin', [AuthController::class, 'logoutAmin'])->name('logout');

