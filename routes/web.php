<?php

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

/**
 * Home Pages
 */
Route::prefix('/')->namespace('Home')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/registration', 'RegistrationController@index');
    Route::post('/registration/verify', 'RegistrationController@register');
    Route::get('/pricing', 'PricingController@index');
    Route::get('/unverified-email', 'EmailVerificationController@index');
    Route::post('/verify-code', 'EmailVerificationController@verify_code');
    Route::get('/service-request', 'ServiceRequestController@index')->middleware('auth');
    Route::post('/service-request/create', 'ServiceRequestController@create');
    Route::get('/voucher', 'VoucherController@index');
});


/**
 * Technician Pages
 */
Route::prefix('tech')->namespace('Technician')->group(function () {
  Route::get('/home', 'TechDashboardController@index');
  Route::get('/account-settings', 'TechUpdateController@index');
  Route::get('/service-history', 'TechHistoryController@index');
  
});

/**
 * Administration Pages
 */
Route::prefix('admin')->namespace('Admin')->group(function () {
  Route::get('/dashboard', 'DashboardController@index');
  Route::get('/back_up_and_restore', 'BackUpController@index');
  Route::get('/generate_reports', 'ReportsController@index');
  Route::get('/profile/my_account', 'UpdateAccountController@index');
  Route::get('/technician_management', 'TechMngController@index');
  Route::get('/services', 'ServicesController@index');
  Route::get('/services/service_request_details', 'ServiceDetailsController@index');
  Route::get('/services/service_history', 'ServiceHistoryController@index');
  Route::get('/calendar', 'CalendarController@index');
  
});


/**
 * Maintenance Pages
 */
Route::prefix('admin/maintenance')->namespace('Admin\Maintenance')->group(function () {
  Route::resource('/service_types', 'ServiceTypeController');
  Route::resource('/property_types', 'PropertyTypeController');
  Route::resource('/location', 'LocationController');
  Route::resource('/aircondition_unit_type', 'UnitTypeController');
  Route::resource('/aircondition_brand', 'BrandController');
  Route::resource('/repair_issues', 'RepairIssueController');
  Route::resource('/mode_of_payment', 'PaymentModeController');
  Route::resource('/service_fees', 'ServiceFeesController');
  Route::resource('/bank_account_details', 'BankDetailsController');
  Route::resource('/service_fees', 'ServiceFeesController');
  Route::resource('/appliance_type', 'ApplianceTypeController');
  Route::resource('/service_timeslots', 'TimeslotsController');

  // ...
});


 /**
  * Client Pages
  */
Route::prefix('client')->namespace('Client')->middleware('auth')->group(function () {
  Route::get('/home', 'ClientDashboardController@index');
  Route::get('/account_settings', 'ClientUpdateController@index');
  Route::put('/update', 'ClientUpdateController@update');
});


/**
 * Authentication Pages
 */

Route::get('/admin/auth/login', 'UsersController@admin_login');
Route::get('/admin/forgot_password', 'UsersController@admin_forgot_password');
Route::get('/tech/auth/login', 'UsersController@tech_login');
Route::get('/tech/forgot_password', 'UsersController@tech_forgot_password');
Route::get('/client/logout', 'UsersController@client_logout');
Route::get('/client/auth/login', 'UsersController@client_login');
Route::post('/client/auth/login/verify', 'UsersController@client_login_verify');
Route::get('/client/forgot_password', 'UsersController@client_forgot_password');