<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CauhoiController;
use App\Http\Controllers\DeThiController;
use App\Http\Controllers\KetquaController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\UserController;
use App\Models\Dethi;
use App\Models\Monhoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//api auth
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::post('logout',[AuthController::class,'logout']);

// api dethi
Route::get('ds-de-thi',[DeThiController::class,'getAllDeThi']);
Route::get('de-thi/{id}',[DeThiController::class,'thongTinDeThi']);
Route::get('chi-tiet-de-thi/{id}',[DeThiController::class,'chiTietDeThi']);
Route::post('them-de-thi',[DeThiController::class,'themDeThi']);
Route::post('sua-de-thi/{id}',[DeThiController::class,'updateDeThi']);

Route::get('dap-an-dung/{id}',[CauhoiController::class,'getDapAnDung']);
Route::delete('xoa-de-thi/{user_id}/{id}',[DeThiController::class,'deleteDeThi']);
Route::put('sua-de-thi/{user_id}/{id}',[DeThiController::class,'update']);

//api mon hoc
Route::get('danh-sach-mon-hoc', [MonHocController::class,'listMonHoc']);
Route::post('them-mon-hoc', [MonHocController::class,'addMonHoc']);
Route::get('chi-tiet-mon-hoc/{id}', [MonHocController::class,'editMonHoc']);
Route::post('update-mon-hoc/{id}', [MonHocController::class,'updateMonHoc']);
Route::get('xoa-mon-hoc/{id}',[MonHocController::class,'xoaMonHoc']);


//api danh sach user
Route::get('danh-sach-sinh-vien',[UserController::class,'getSinhVien']);

//ketqua
Route::post('nop-bai',[KetquaController::class,'ketQuaLamBai']);