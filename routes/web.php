<?php

use App\Http\Livewire\Index;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Livewire\ForgotPassword;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PackageimgController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomervehicleController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MachinesController;
use App\Http\Controllers\WorkingdaysController;
use App\Http\Controllers\LoyaltyPointController;
use App\Http\Controllers\VehiclesSuggestController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ServicerecordController;
use App\Http\Controllers\PackagerecordController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\NotificationController;


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
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-signup', [CustomAuthController::class, 'signupJoin'])->name('login.signup_join');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/signup', [CustomAuthController::class, 'signUp'])->name('signup');


Route::post('excelExport-service-report', [ReportsController::class, 'bookingExcelExport'])->name('servicereport.excelExport');
Route::post('createPDF-service-report', [ReportsController::class, 'bookingCreatePDF'])->name('servicereport.createPDF');

Route::post('excelExport-package-report', [ReportsController::class, 'packageExcelExport'])->name('packagereport.excelExport');
Route::post('createPDF-package-report', [ReportsController::class, 'packageCreatePDF'])->name('packagereport.createPDF');

Route::group(['middleware' => ['admin_auth','prevent-back-history']], function(){
// Dashboard Routes
    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

//Reset password
    Route::get('/reset', [CustomAuthController::class, 'reset'])->name('login.reset');
    Route::post('reset-admin', [CustomAuthController::class, 'resetadmin'])->name('login.resetadmin');

// Vehicle Suggest Routes
Route::get('add-messages', [VehiclesSuggestController::class, 'create'])->name('message.create');
Route::post('save-messages', [VehiclesSuggestController::class, 'store'])->name('message.store');

// Coupon Routes
Route::get('coupon', [CouponController::class, 'index'])->name('coupon');
Route::get('add-coupon', [CouponController::class, 'create'])->name('coupon.create');
Route::post('save-coupon', [CouponController::class, 'store'])->name('coupon.store');
Route::get('edit-coupon/{couponId}', [CouponController::class, 'edit'])->name('coupon.edit');
Route::get('show-coupon/{couponId}', [CouponController::class, 'show'])->name('coupon.show');
Route::post('update-coupon', [CouponController::class, 'update'])->name('coupon.update');
Route::get('delete-coupon/{couponId}', [CouponController::class, 'destroy'])->name('coupon.delete');

// Machine Routes
Route::get('machine', [MachinesController::class, 'index'])->name('machine');
Route::get('add-machine', [MachinesController::class, 'create'])->name('machine.create');
Route::post('save-machine', [MachinesController::class, 'store'])->name('machine.store');
Route::get('edit-machine/{machineId}', [MachinesController::class, 'edit'])->name('machine.edit');
Route::get('show-machine/{machineId}', [MachinesController::class, 'show'])->name('machine.show');
Route::post('update-machine', [MachinesController::class, 'update'])->name('machine.update');
Route::get('delete-machine/{machineId}', [MachinesController::class, 'destroy'])->name('machine.delete');

// Reports Routes
    Route::get('create-report', [ReportsController::class, 'create'])->name('report.create');
    Route::post('search-report', [ReportsController::class, 'store'])->name('report.store');

// Notification Routes
    Route::get('notification', [NotificationController::class, 'index'])->name('notification');
    Route::post('save-notification', [NotificationController::class, 'store'])->name('notification.store');


// Loyalty Point Routes
    Route::get('loyaltypoint', [LoyaltyPointController::class, 'index'])->name('loyaltypoint');
    Route::get('add-loyaltypoint', [LoyaltyPointController::class, 'create'])->name('loyaltypoint.create');
    Route::post('save-loyaltypoint', [LoyaltyPointController::class, 'store'])->name('loyaltypoint.store');
    Route::get('edit-loyaltypoint/{loyaltypointId}', [LoyaltyPointController::class, 'edit'])->name('loyaltypoint.edit');
    Route::post('update-loyaltypoint', [LoyaltyPointController::class, 'update'])->name('loyaltypoint.update');
    Route::get('delete-loyaltypoint/{loyaltypointId}', [LoyaltyPointController::class, 'destroy'])->name('loyaltypoint.delete');

// WorkingDays Routes
    Route::get('workingdays', [WorkingdaysController::class, 'index'])->name('workingdays');
    Route::get('add-workingdays', [WorkingdaysController::class, 'create'])->name('workingdays.create');
    Route::post('save-workingdays', [WorkingdaysController::class, 'store'])->name('workingdays.store');
    Route::get('edit-workingdays/{workingDayId}', [WorkingdaysController::class, 'edit'])->name('workingdays.edit');
    Route::post('update-workingdays', [WorkingdaysController::class, 'update'])->name('workingdays.update');
    Route::get('delete-workingdays/{workingDayId}', [WorkingdaysController::class, 'destroy'])->name('workingdays.delete');

// Package Routes
Route::get('package', [PackageController::class, 'index'])->name('package');
Route::get('add-package', [PackageController::class, 'create'])->name('package.create');
Route::post('save-package', [PackageController::class, 'store'])->name('package.store');
Route::get('edit-package/{packId}', [PackageController::class, 'edit'])->name('package.edit');
Route::get('show-package/{packId}', [PackageController::class, 'show'])->name('package.show');
Route::post('update-package', [PackageController::class, 'update'])->name('package.update');
Route::get('delete-package/{packId}', [PackageController::class, 'destroy'])->name('package.delete');
// Package Image Routes
Route::post('delete-packageimg', [PackageimgController::class, 'destroy'])->name('packageimg.delete');
// Shop Routes
//Route::get('shop', [ShopController::class, 'index'])->name('shop');
//Route::post('save-shop', [ShopController::class, 'store'])->name('shop.store');
//Route::get('edit-shop/{shopId}', [ShopController::class, 'edit'])->name('shop.edit');
//Route::post('update-shop', [ShopController::class, 'update'])->name('shop.update');
//Route::get('delete-shop/{shopId}', [ShopController::class, 'destroy'])->name('shop.delete');
// Customer Routes
Route::get('reminderUser', [CustomerController::class, 'reminderUser'])->name('reminderUser');
Route::post('loadBrands', [CustomerController::class, 'loadBrands'])->name('loadBrands');
Route::post('loadModels', [CustomerController::class, 'loadModels'])->name('loadModels');
Route::post('loadVariants', [CustomerController::class, 'loadVariants'])->name('loadVariants');
Route::post('loadTyres', [CustomerController::class, 'loadTyres'])->name('loadTyres');
Route::get('customer', [CustomerController::class, 'index'])->name('customer');
Route::get('add-customer', [CustomerController::class, 'create'])->name('customer.create');
Route::post('save-customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('edit-customer/{custId}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('show-customer/{custId}', [CustomerController::class, 'show'])->name('customer.show');
Route::post('update-customer', [CustomerController::class, 'update'])->name('customer.update');
Route::get('delete-customer/{custId}', [CustomerController::class, 'destroy'])->name('customer.delete');

// Customer Vehicle Routes
Route::get('customervehicle', [CustomervehicleController::class, 'index'])->name('customervehicle');
Route::get('add-customervehicle', [CustomervehicleController::class, 'create'])->name('customervehicle.create');
Route::post('save-customervehicle', [CustomervehicleController::class, 'store'])->name('customervehicle.store');
Route::get('edit-customervehicle/{id}', [CustomervehicleController::class, 'edit'])->name('customervehicle.edit');
Route::post('update-customervehicle', [CustomervehicleController::class, 'update'])->name('customervehicle.update');
Route::get('delete-customervehicle/{id}', [CustomervehicleController::class, 'destroy'])->name('customervehicle.delete');

// Service Record Routes
Route::get('servicerecord', [ServicerecordController::class, 'index'])->name('servicerecord');
Route::get('specialrequest-servicerecord', [ServicerecordController::class, 'specialrequest'])->name('servicerecord.specialrequest');
Route::get('add-servicerecord', [ServicerecordController::class, 'create'])->name('servicerecord.create');
Route::post('save-servicerecord', [ServicerecordController::class, 'store'])->name('servicerecord.store');
Route::get('edit-servicerecord/{id}', [ServicerecordController::class, 'edit'])->name('servicerecord.edit');
Route::get('show-servicerecord/{id}', [ServicerecordController::class, 'show'])->name('servicerecord.show');
Route::post('update-servicerecord', [ServicerecordController::class, 'update'])->name('servicerecord.update');
Route::get('delete-servicerecord/{id}', [ServicerecordController::class, 'destroy'])->name('servicerecord.delete');

// Package Record Routes
Route::get('packagerecord', [PackagerecordController::class, 'index'])->name('packagerecord');
Route::get('add-packagerecord', [PackagerecordController::class, 'create'])->name('packagerecord.create');
Route::post('save-packagerecord', [PackagerecordController::class, 'store'])->name('packagerecord.store');
Route::get('edit-packagerecord/{id}', [PackagerecordController::class, 'edit'])->name('packagerecord.edit');
Route::post('update-packagerecord', [PackagerecordController::class, 'update'])->name('packagerecord.update');
Route::get('delete-packagerecord/{id}', [PackagerecordController::class, 'destroy'])->name('packagerecord.delete');

// Feature Routes
Route::get('service', [FeatureController::class, 'index'])->name('feature');
Route::get('add-service', [FeatureController::class, 'create'])->name('feature.create');
Route::post('save-service', [FeatureController::class, 'store'])->name('feature.store');
Route::get('edit-service/{featureId}', [FeatureController::class, 'edit'])->name('feature.edit');
Route::get('show-service/{featureId}', [FeatureController::class, 'show'])->name('feature.show');
Route::post('update-service', [FeatureController::class, 'update'])->name('feature.update');
Route::get('delete-service/{featureId}', [FeatureController::class, 'destroy'])->name('feature.delete');
});
});
