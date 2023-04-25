<?php

use App\Http\Controllers\SalesController;
use App\Models\Sales;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('upload', [SalesController::class,'index']);

Route::post('upload', [SalesController::class,'upload']);

//Route::get('store-data',[SalesController::class,'store']);
