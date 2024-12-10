<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
   
   Route::get('blogs', [BlogController::class, 'index'])->middleware('permission:view-blogs');
   Route::get('blogs/{id}', [BlogController::class, 'show'])->middleware('permission:view-blog');
   Route::post('blogs', [BlogController::class, 'store'])->middleware('permission:create-blog');
   Route::put('blogs/{id}', [BlogController::class, 'update'])->middleware('permission:edit-blog');
  
});
