<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'role:superadmin'])->group(function () {
    Route::get('/roles', [RolePermissionController::class, 'index']);
    Route::post('/roles', [RolePermissionController::class, 'store']);
    Route::get('/roles/{id}', [RolePermissionController::class, 'show']);
    Route::post('/roles/{id}/permissions', [RolePermissionController::class, 'addPermission']);
});

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/users', [UserController::class, 'store']);
});
