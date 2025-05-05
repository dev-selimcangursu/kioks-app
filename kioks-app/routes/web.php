<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('index');
Route::post('/sales-form',[HomeController::class,'salesInfo'])->name('salesInfo');
Route::post('/service-form',[HomeController::class,'serviceSupport'])->name('serviceSupport');
Route::post('/service-give-product-form',[HomeController::class,'giveServiceProduct'])->name('giveServiceProduct');
Route::post('/service-receive-product-form',[HomeController::class,'receiveServiceProduct'])->name('receiveServiceProduct');