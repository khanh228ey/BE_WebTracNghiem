<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeThiController;
use App\Http\Controllers\UserController;
use App\Models\Dethi;
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
Route::get('de-thi/{slug}',[DeThiController::class,'thongTinDeThi']);
Route::get('chi-tiet-de-thi/{slug}',[DeThiController::class,'chiTietDeThi']);



Route::get('danh-sach-sinh-vien',[UserController::class,'getSinhVien']);
