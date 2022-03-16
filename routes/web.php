<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return to_route('login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');

Route::get('complaint/manage', [\App\Http\Controllers\ComplaintController::class, 'manageComplaint'])->name('complaint.manage');
Route::resource('complaint', \App\Http\Controllers\ComplaintController::class);
Route::resource('remark', \App\Http\Controllers\RemarkController::class);
Route::get('remark/complaint/{complaint}', [\App\Http\Controllers\RemarkController::class, 'create'])->name('remark.complaint.create');
Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);

//Route::controller(\App\Http\Controllers\ComplaintController::class)->middleware(['auth:sanctum', 'verified'])->group(function () {
//    Route::get('/orders/{id}', 'show');
//});


