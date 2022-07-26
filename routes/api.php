<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PackageControllerApi;
use App\Http\Controllers\Api\UserControllerApi;
use App\Http\Controllers\Api\WorkingdaysControllerApi;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [UserControllerApi::class, 'login'])->name('user.login');
Route::post('register', [UserControllerApi::class, 'register'])->name('user.register');
Route::post('otp_register_complete', [UserControllerApi::class, 'otp_register_complete'])->name('user.otp_register_complete');
Route::post('viewProfile', [UserControllerApi::class, 'viewProfile'])->name('user.viewProfile');
Route::post('profileUpdate', [UserControllerApi::class, 'profileUpdate'])->name('user.profileUpdate');


Route::post('packages_list', [PackageControllerApi::class, 'list'])->name('packages.list');
Route::post('userpackagelist', [PackageControllerApi::class, 'userpackagelist'])->name('packages.userpackagelist');
Route::post('userpackagelistActive', [PackageControllerApi::class, 'userpackagelistActive'])->name('packages.userpackagelistActive');
Route::post('workingdays_list', [WorkingdaysControllerApi::class, 'list'])->name('workingdays.list');
