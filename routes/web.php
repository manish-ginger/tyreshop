<?php

use App\Http\Livewire\Index;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Livewire\ForgotPassword;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTyreController;
use App\Http\Controllers\VehicleCategoryController;
use App\Http\Controllers\VehicleBrandController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\WashingTypeController;
use App\Http\Controllers\VehiclesSuggestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
// Basic Routes
Route::group(['prefix' => 'admin'], function(){
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::get('/reset', [CustomAuthController::class, 'reset'])->name('login.reset');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('reset-admin', [CustomAuthController::class, 'resetadmin'])->name('login.resetadmin');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
// Dashboard Routes
Route::group(['middleware' => ['admin_auth','prevent-back-history']], function(){
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
//Reset password
Route::get('/reset', [CustomAuthController::class, 'reset'])->name('login.reset');
Route::post('reset-admin', [CustomAuthController::class, 'resetadmin'])->name('login.resetadmin');
// Banner Routes
Route::get('banner', [BannerController::class, 'index'])->name('banner');
Route::get('add-banner', [BannerController::class, 'create'])->name('banner.create');
Route::post('save-banner', [BannerController::class, 'store'])->name('banner.store');
Route::get('edit-banner/{packId}', [BannerController::class, 'edit'])->name('banner.edit');
Route::post('update-banner', [BannerController::class, 'update'])->name('banner.update');
Route::get('delete-banner/{bannerId}', [BannerController::class, 'destroy'])->name('banner.delete');
// Vehicle Suggest Routes
    Route::get('messages', [VehiclesSuggestController::class, 'index'])->name('messages');
    Route::post('save-messages', [VehiclesSuggestController::class, 'store'])->name('message.store');

// Shop Routes
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('add-shop', [ShopController::class, 'create'])->name('shop.create');
Route::post('save-shop', [ShopController::class, 'store'])->name('shop.store');
Route::get('edit-shop/{shopId}', [ShopController::class, 'edit'])->name('shop.edit');
Route::get('show-shop/{shopId}', [ShopController::class, 'show'])->name('shop.show');
Route::post('update-shop', [ShopController::class, 'update'])->name('shop.update');
Route::get('delete-shop/{shopId}', [ShopController::class, 'destroy'])->name('shop.delete');

// Notification Routes
Route::get('notification', [NotificationController::class, 'index'])->name('notification');
Route::post('save-notification', [NotificationController::class, 'store'])->name('notification.store');

// Vehicle Routes
Route::post('loadVariants', [VehicleTyreController::class, 'loadVariants'])->name('loadVariants');
Route::get('tyre', [VehicleTyreController::class, 'index'])->name('vehicletyre');
Route::get('add-tyre', [VehicleTyreController::class, 'create'])->name('vehicletyre.create');
Route::post('save-tyre', [VehicleTyreController::class, 'store'])->name('vehicletyre.store');
Route::get('edit-tyre/{vehicleTyreId}', [VehicleTyreController::class, 'edit'])->name('vehicletyre.edit');
Route::post('update-tyre', [VehicleTyreController::class, 'update'])->name('vehicletyre.update');
Route::get('delete-tyre/{vehicleTyreId}', [VehicleTyreController::class, 'destroy'])->name('vehicletyre.delete');


// Vehicle Routes
Route::post('loadModels', [VehicleController::class, 'loadModels'])->name('loadModels');
Route::get('tyrenumber', [VehicleController::class, 'index'])->name('vehicle');
Route::get('add-tyrenumber', [VehicleController::class, 'create'])->name('vehicle.create');
Route::post('save-tyrenumber', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('edit-tyrenumber/{vehicleId}', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::post('update-tyrenumber', [VehicleController::class, 'update'])->name('vehicle.update');
Route::get('delete-tyrenumber/{vehicleId}', [VehicleController::class, 'destroy'])->name('vehicle.delete');
// VehicleCategory Routes
Route::get('tyrebrand', [VehicleCategoryController::class, 'index'])->name('vehiclecategory');
Route::get('add-tyrebrand', [VehicleCategoryController::class, 'create'])->name('vehiclecategory.create');
Route::post('save-tyrebrand', [VehicleCategoryController::class, 'store'])->name('vehiclecategory.store');
Route::get('edit-tyrebrand/{vehicleCategoryId}', [VehicleCategoryController::class, 'edit'])->name('vehiclecategory.edit');
Route::post('update-tyrebrand', [VehicleCategoryController::class, 'update'])->name('vehiclecategory.update');
Route::get('delete-tyrebrand/{vehicleCategoryId}', [VehicleCategoryController::class, 'destroy'])->name('vehiclecategory.delete');

// VehicleBrand Routes
Route::get('tyremodel', [VehicleBrandController::class, 'index'])->name('vehiclebrand');
Route::get('brandpershop', [VehicleBrandController::class, 'brandpershop'])->name('brandpershop');
Route::get('add-tyremodel', [VehicleBrandController::class, 'create'])->name('vehiclebrand.create');
Route::post('save-tyremodel', [VehicleBrandController::class, 'store'])->name('vehiclebrand.store');
Route::get('edit-tyremodel/{vehicleBrandId}', [VehicleBrandController::class, 'edit'])->name('vehiclebrand.edit');
Route::post('update-tyremodel', [VehicleBrandController::class, 'update'])->name('vehiclebrand.update');
Route::post('update-brandpershop', [VehicleBrandController::class, 'update_brandpershop'])->name('vehiclebrand.update_brandpershop');
Route::get('delete-tyremodel/{vehicleBrandId}', [VehicleBrandController::class, 'destroy'])->name('vehiclebrand.delete');

// VehicleModel Routes
Route::post('loadBrands', [VehicleModelController::class, 'loadBrands'])->name('loadBrands');
Route::get('tyresize', [VehicleModelController::class, 'index'])->name('vehiclemodel');
Route::get('add-tyresize', [VehicleModelController::class, 'create'])->name('vehiclemodel.create');
Route::post('save-tyresize', [VehicleModelController::class, 'store'])->name('vehiclemodel.store');
Route::get('edit-tyresize/{vehicleModelId}', [VehicleModelController::class, 'edit'])->name('vehiclemodel.edit');
Route::post('update-tyresize', [VehicleModelController::class, 'update'])->name('vehiclemodel.update');
Route::get('delete-tyresize/{vehicleModelId}', [VehicleModelController::class, 'destroy'])->name('vehiclemodel.delete');

// Washing Type Routes
Route::get('washingtype', [WashingTypeController::class, 'index'])->name('washingtype');
Route::post('update-washingtypepershop', [WashingTypeController::class, 'update_washingtypepershop'])->name('washingtype.update_washingtypepershop');
Route::get('add-washingtype', [WashingTypeController::class, 'create'])->name('washingtype.create');
Route::post('save-washingtype', [WashingTypeController::class, 'store'])->name('washingtype.store');
Route::get('edit-washingtype/{washingtypeId}', [WashingTypeController::class, 'edit'])->name('washingtype.edit');
Route::post('update-washingtype', [WashingTypeController::class, 'update'])->name('washingtype.update');
Route::get('delete-washingtype/{washingtypeId}', [WashingTypeController::class, 'destroy'])->name('washingtype.delete');

// Role Routes
    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::get('add-role', [RoleController::class, 'create'])->name('role.create');
    Route::post('save-role', [RoleController::class, 'store'])->name('role.store');
    Route::get('edit-role/{roleId}', [RoleController::class, 'edit'])->name('role.edit');
    Route::get('show-role/{roleId}', [RoleController::class, 'show'])->name('role.show');
    Route::post('update-role', [RoleController::class, 'update'])->name('role.update');
    Route::get('delete-role/{roleId}', [RoleController::class, 'destroy'])->name('role.delete');

// User Routes
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('add-user', [UserController::class, 'create'])->name('user.create');
    Route::post('save-user', [UserController::class, 'store'])->name('user.store');
    Route::get('edit-user/{userId}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('show-user/{userId}', [UserController::class, 'show'])->name('user.show');
    Route::post('update-user', [UserController::class, 'update'])->name('user.update');
    Route::get('delete-user/{userId}', [UserController::class, 'destroy'])->name('user.delete');
});
});
