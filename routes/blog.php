<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
   Route::apiResource('blogs', BlogController::class)->middleware([
      'index' => 'permission:view-blogs',
      'show' => 'permission:view-blog',
      'store' => 'permission:create-blog',
      'update' => 'permission:edit-blog',
      'destroy' => 'permission:delete-blog',
   ]);
});
