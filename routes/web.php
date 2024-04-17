<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DayController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ClinicTimeController;
use App\Http\Controllers\LongHolidayController;

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
    return view('welcome');
});


Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth.registerPage');
Route::post('user/register',[AuthController::class,'userRegister'])->name('register');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth.loginPage');

Route::middleware(['auth'])->group(function(){
    //login, register
    Route::redirect('/', 'loginPage');
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('logout',[AuthController::class,'adminDestroy'])->name('admin.logout');
    Route::get('profile',[AuthController::class,'adminProfile'])->name('admin.profile');
    Route::post('/profile/store',[AuthController::class,'adminProfileStore'])->name('admin.profileStore');
    Route::get('/change/password',[AuthController::class,'adminChangePassword'])->name('admin.changePassword');
    Route::post('/update/password',[AuthController::class,'updatePassword'])->name('admin.updatePassword');



    });

    //Clinic auth
    Route::middleware(['auth'])->group(function(){
        
        Route::get('/clinic/list',[ClinicController::class,'clinicList'])->name('clinic.list');
        Route::post('/clinic/store',[ClinicController::class,'clinicStore'])->name('clinic.store');
        Route::post('/clinic/update',[ClinicController::class,'clinicUpdate'])->name('clinic.update');
        Route::get('/clinic/delete/{id}',[ClinicController::class,'clinicDelete'])->name('clinic.delete');
        Route::post('/clinic/day/store',[DayController::class,'clinicDayStore'])->name('clinic.day');


        });
        //Schedule
   Route::middleware(['auth'])->group(function(){
        Route::post('/clinic/time/store',[ClinicTimeController::class,'clinictTimeStore'])->name('clinic.time_store');
        Route::post('/clinic/time/update',[ClinicTimeController::class,'clinictTimeUpdate'])->name('clinic.time_update');
        Route::get('/clinic/time/delete/{id}',[ClinicTimeController::class,'clinicTimeDelete'])->name('clinic.time_delete');
        Route::get('/clinic/schedule/page',[ClinicTimeController::class,'clinicSchedulePage'])->name('clinic.schedule');
        Route::get('/clinic/time/holiday/change/{id}',[ClinicTimeController::class,'clinictHolidayChange'])->name('clinic.holiday_change');
        Route::get('/clinic/time/holiday/change1/{id}',[ClinicTimeController::class,'clinictHolidayChange1'])->name('clinic.holiday_change1');     
      });

      Route::middleware(['auth'])->group(function(){
        Route::post('/clinic/logn_holiday/store',[LongHolidayController::class,'clinicLongHolidayStore'])->name('clinic.long_holiday_store');
        Route::post('/clinic/long_holidat/update',[LongHolidayController::class,'clinictLongHolidayUpdate'])->name('clinic.long_holiday_update');
        Route::get('/clinic/logn_holiday/delete/{id}',[LongHolidayController::class,'clinicLongHolidayDelete'])->name('clinic.long_holiday_delete');

        Route::get('/clinic/logn_holiday/page',[LongHolidayController::class,'clinicLongHolidayPage'])->name('clinic.long_holiday');
       
      });
      

