<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpeditionController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\DetailOrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


// 🔹 USER
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/data', [UserController::class, 'getData'])->name('user.data');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');


// ✅ CRUD dengan resource
Route::get('/expedition/data', [ExpeditionController::class, 'getData'])->name('expedition.data');
Route::resource('expedition', ExpeditionController::class);

Route::get('/template/data', [TemplateController::class, 'getData'])->name('template.data');
Route::resource('template', TemplateController::class);

Route::get('/matching/data', [MatchingController::class, 'getData'])->name('matching.data');
Route::resource('matching', MatchingController::class);

Route::get('/detailorder/data', [DetailOrderController::class, 'getData'])->name('detailorder.data');
Route::resource('detailorder', DetailOrderController::class);

// ✅ (Opsional) DataTables AJAX route (kalau kamu pakai Yajra)
