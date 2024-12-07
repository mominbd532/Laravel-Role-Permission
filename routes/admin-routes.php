<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth:api','isAdmin')->group(function () {
   Route::apiResource('roles', RoleController::class);
   Route::apiResource('permissions', PermissionController::class);
   Route::apiResource('users', UserController::class);
});
