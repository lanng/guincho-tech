<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PlateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('drivers', DriverController::class);
    Route::apiResource('insurances', InsuranceController::class);
    Route::apiResource('plates', PlateController::class);
    Route::apiResource('invoices', InvoiceController::class);
});

