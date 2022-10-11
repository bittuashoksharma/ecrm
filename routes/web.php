<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('main');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('{view}',App\Http\Controllers\HomeController::class)->where('view','(.*)');

Route::post('/api/get-filled-form-setup',[App\Http\Controllers\API\EmployeeControllers::class, 'getFilledFormSetup']);
Route::post('/api/get-employee-personal-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'getEmployeePersonalDetail']);
Route::post('/api/get-total-employee-count',[App\Http\Controllers\API\EmployeeControllers::class, 'getTotalEmployeeCount']);
Route::post('/api/get-employee-company-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'getEmployeeCompanyDetail']);
Route::post('/api/get-employee-financial-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'getEmployeeFinancialDetail']);
Route::post('/api/get-employees',[App\Http\Controllers\API\EmployeeControllers::class, 'getEmployees']);


Route::post('/api/add-employee-personal-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'storeEmployeePersonalDetail']);
Route::post('/api/add-employee-company-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'storeEmployeeCompanyDetail']);
Route::post('/api/add-employee-financial-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'storeEmployeeFinancialDetail']);
Route::post('/api/add-employee-bank-account-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'storeEmployeeBankAccountDetail']);
Route::post('/api/add-employee-document-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'storeEmployeeDocumentDetail']);
Route::post('/api/add-employee-document-detail',[App\Http\Controllers\API\EmployeeControllers::class, 'storeEmployeeDocumentDetail']);
Route::post('/api/create-offer-letter-pdf',[App\Http\Controllers\API\EmployeeControllers::class, 'createOfferLetterPdf']);


Route::post('/api/setting-offer-letter',[App\Http\Controllers\API\SettingControllers::class, 'storeOfferLetterFormat']);
Route::post('/api/get-offer-letter-format',[App\Http\Controllers\API\SettingControllers::class, 'getCompanyOfferLetterFormatDetail']);
Route::post('/api/get-employee-offer-letter-content',[App\Http\Controllers\API\EmployeeControllers::class, 'getEmployeeOfferLetterContent']);
Route::post('/api/store-employee-letter-datails',[App\Http\Controllers\API\EmployeeControllers::class, 'storeEmployeeLetterDetails']);




