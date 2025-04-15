<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;

Route::get('/',[HomeController::class,'index']);

Route::get('/create',[DetailController::class,'index']);

Route::post('/handlecreate',[DetailController::class,'handlecreate']);
