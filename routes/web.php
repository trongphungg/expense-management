<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\HistoryController;

Route::get('/',[HomeController::class,'index'])
->name('trangchu');

Route::get('/create/{id}',[DetailController::class,'index'])
->name('dangnhap');

Route::post('/handlecreate',[DetailController::class,'handlecreate']);

Route::get('/total',[TotalController::class,'index'])
->name('tongchitieu');

Route::get('/history',[HistoryController::class,'index'])
->name('lichsu');
