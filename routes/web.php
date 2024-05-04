<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckPermission;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('login', [AuthController::class, 'login']);

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('check', [CheckPermission::class, 'checkPermissionAdmin']);
});
