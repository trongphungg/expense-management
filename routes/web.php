<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AdminController;

use App\Http\Middleware\KiemTraDangNhap;

Route::get('/',[HomeController::class,'index'])
->name('trangchu');

Route::get('/create/{id}',[DetailController::class,'index'])
->name('dangnhap');

Route::post('/handlecreate',[DetailController::class,'handlecreate']);

Route::get('/total/{id}',[TotalController::class,'index'])
->name('tongchitieu');

Route::get('/history/{id}',[HistoryController::class,'index'])
->name('lichsu');

Route::get('/finish',[TotalController::class,'finish'])
->name('tattoan');


Route::get('/admin',[AdminController::class,'index'])
->name('admin');

Route::post('/login',[AdminController::class,'login'])
->name('login');

Route::get('/dashboard',[AdminController::class,'dashboard'])
->name('dashboard');


Route::get('/create',[AdminController::class,'create'])
->name('create');

Route::post('/create/finish',[AdminController::class,'handleCreate'])
->name('handleCreate');

Route::get('/createExpense',[AdminController::class,'createExpense'])
->name('createExpense');

Route::post('/createExpense/finish',[AdminController::class,'handleCreateExpense'])
->name('handleCreateExpense');