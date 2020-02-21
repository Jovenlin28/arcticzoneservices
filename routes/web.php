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
    Route::get('/pricing/get-service-fees', 'PricingController@get_service_fees');
    Route::get('/unverified-email', 'EmailVerificationController@index');
    Route::post('/verify-code', 'EmailVerificationController@verify_code');
    Route::get('/service-request', 'ServiceRequestController@index')->middleware('auth');
    Route::post('/service-request/create', 'ServiceRequestController@create');
    Route::post('/service-request/finish', 'ServiceRequestController@finish_service_request');
    Route::post('/service-request/reschedule', 'ServiceRequestController@reschedule_service_request');
    Route::get('/voucher', 'VoucherController@index');
    Route::get('/voucher/download', 'VoucherController@download_voucher');

    Route::get('/reports/client-billing-details', 'ReportsController@client_billing_details');
    Route::get('/reports/service-requests', 'ReportsController@service_requests');
});


/**
 * Technician Pages
 */
Route::prefix('tech')->namespace('Technician')
->middleware('auth:technician')
->group(function () {
  Route::get('/home', 'TechDashboardController@index');
  Route::get('/account-settings', 'TechUpdateController@index');
  Route::get('/service-history', 'TechHistoryController@index');
});

/**
 * Administration Pages
 */
Route::prefix('admin')->namespace('Admin')
->middleware('auth:admin')
->group(function () {
  Route::get('/dashboard', 'DashboardController@index');
  Route::get('/back_up_and_restore', 'BackUpController@index');
  Route::get('/generate_reports', 'ReportsController@index');
  Route::get('/generate_reports/service_requests_report', 'ReportsController@generate_service_requests_report');
  Route::get('/generate_reports/service_requests_status_report', 'ReportsController@generate_service_requests_status_report');
  Route::get('/generate_reports/technician_service_jobs_report', 'ReportsController@generate_technician_service_jobs_report');
  Route::get('/generate_reports/client_billing_report', 'ReportsController@generate_client_billing_report');
  Route::get('/profile/my_account', 'UpdateAccountController@index');
  Route::get('/technician_management', 'TechMngController@index');
  Route::post('/tech_management/add_technician', 'TechMngController@add_technician');
  Route::get('/services', 'ServicesController@index');
  Route::post('/services/assign_technicians', 'ServicesController@assign_technician');
  Route::get('/services/service_request_details/{id}', 'ServicesController@get_service_request');
  Route::get('/services/service_history', 'ServiceHistoryController@index');
  Route::get('/calendar', 'CalendarController@index');
  Route::put('/services/complete_service_request', 'ServicesController@complete_service_request');
  Route::put('/technician_management/update_availability_status', 'TechMngController@update_availability_status');
  Route::post('/service_request/confirm_payment', 'ServicesController@confirm_payment');
});


/**
 * Maintenance Pages
 */
Route::prefix('admin/maintenance')->namespace('Admin\Maintenance')
->middleware('auth:admin')
->group(function () {
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
  Route::post('/upload_photo', 'ClientUpdateController@upload_photo');
  Route::post('/service_request/attach_receipt_payment', 'ClientDashboardController@attach_receipt_payment');
  Route::put('/service_request/cancel', 'ClientDashboardController@cancel_service_request');
  Route::get('/generate_reports/client_billing_report', 'ReportsController@generate_client_billing_report');
});


/**
 * Authentication Pages
 */

Route::get('/admin/logout', 'UsersController@admin_logout');
Route::get('/admin/auth/login', 'UsersController@admin_login');
Route::post('/admin/auth/login/verify', 'UsersController@admin_login_verify');
Route::get('/admin/forgot_password', 'UsersController@admin_forgot_password');
Route::get('/tech/logout', 'UsersController@tech_logout');
Route::get('/tech/auth/login', 'UsersController@tech_login');
Route::post('/tech/auth/login/verify', 'UsersController@tech_login_verify');
Route::get('/tech/forgot_password', 'UsersController@tech_forgot_password');
Route::get('/client/logout', 'UsersController@client_logout');
Route::get('/client/auth/login', 'UsersController@client_login');
Route::post('/client/auth/login/verify', 'UsersController@client_login_verify');
Route::get('/client/forgot_password', 'UsersController@client_forgot_password');