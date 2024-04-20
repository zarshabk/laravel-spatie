<?php

use App\Http\Controllers\permissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [permissionController::class, 'index'])->name("home");
Route::get('/permission/add', [permissionController::class, 'create'])->name('permission.create');
Route::post('/permission/store', [permissionController::class, 'store'])->name('permission.store');
Route::get('/permission/{id}', [permissionController::class, 'edit'])->name('permission.edit');
Route::put('/permission/update', [permissionController::class, 'update'])->name('permission.update');
Route::delete('/permission/delete/{id}', [permissionController::class, 'destroy'])->name('permission.delete');






Route::get('/roles', [RoleController::class, 'index'])->name("roles.home");
Route::get('/role/add', [RoleController::class, 'create'])->name('role.create');
Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::put('/role/update', [RoleController::class, 'update'])->name('role.update');
Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');


Route::get('/role/{id}/permission', [RoleController::class, 'givePermission'])->name("role.give-permission");
Route::put('/role/{id}/permission', [RoleController::class, 'updatePermission'])->name("role.update-permission");
