<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee', 'App\Http\Controllers\DataEmployeeController@index');
Route::get('/employee/{id}', 'App\Http\Controllers\DataEmployeeController@getEmployeeById');
Route::post('/employee', 'App\Http\Controllers\DataEmployeeController@createDataEmployee');
Route::put('/employee-update/{id}', 'App\Http\Controllers\DataEmployeeController@updateDataEmployee');
Route::delete('/employee-delete/{id}', 'App\Http\Controllers\DataEmployeeController@deleteDataEmployee');

Route::get('/payroll', 'App\Http\Controllers\PayrollController@index');
Route::get('/payroll/{id}', 'App\Http\Controllers\PayrollController@getPayrollById');
Route::post('/count-payroll', 'App\Http\Controllers\PayrollController@countSallary');
Route::post('/payroll', 'App\Http\Controllers\PayrollController@createDataPayroll');
Route::put('/payroll-update/{id}', 'App\Http\Controllers\PayrollController@updateDataPayroll');
Route::delete('/payroll-delete/{id}', 'App\Http\Controllers\PayrollController@deleteDataPayroll');

Route::get('/presence', 'App\Http\Controllers\PrecenseController@index');
Route::get('/presence/{id}', 'App\Http\Controllers\PrecenseController@getPresenceById');
Route::post('/presence', 'App\Http\Controllers\PrecenseController@createDataPresence');
Route::put('/presence-update/{id}', 'App\Http\Controllers\PrecenseController@updateDataPresence');
Route::delete('/presence-delete/{id}', 'App\Http\Controllers\PrecenseController@deleteDataPresence');

Route::get('/claimreimbursement', 'App\Http\Controllers\ClaimReimbursementController@index');
Route::get('/claimreimbursement/{id}', 'App\Http\Controllers\ClaimReimbursementController@getClaimReimbursementById');
Route::post('/claimreimbursement', 'App\Http\Controllers\ClaimReimbursementController@createDataReimbursement');
Route::put('/claimreimbursement-update/{id}', 'App\Http\Controllers\ClaimReimbursementController@updateDataRimbursement');
Route::delete('/claimreimbursement-delete/{id}', 'App\Http\Controllers\ClaimReimbursementController@deleteDataReimbursement');

Route::get('/category', 'App\Http\Controllers\CategoryController@index');
Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@getCategoryById');
Route::post('/category', 'App\Http\Controllers\CategoryController@createDataCategory');
Route::put('/category-update/{id}', 'App\Http\Controllers\CategoryController@updateDataCategory');
Route::delete('/category-delete/{id}', 'App\Http\Controllers\CategoryController@deleteDataCategory');

Route::get('/income-budget', 'App\Http\Controllers\IncomeBudgetController@index');
Route::get('/income-budget/{id}', 'App\Http\Controllers\IncomeBudgetController@getIncomeBudgetById');
Route::post('/income-budget', 'App\Http\Controllers\IncomeBudgetController@createDataIncomeBudget');
Route::put('/income-budget-update/{id}', 'App\Http\Controllers\IncomeBudgetController@updateDataIncomeBudget');
Route::delete('/income-budget-delete/{id}', 'App\Http\Controllers\IncomeBudgetController@deleteDataIncomeBudget');


Route::post('login', 'App\Http\Controllers\API\UserController@login');
Route::post('register', 'App\Http\Controllers\API\UserController@register');
Route::post('registers', 'App\Http\Controllers\API\UserController@createAuthUser');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});
