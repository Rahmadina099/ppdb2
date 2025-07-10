<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\SiswaController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('user', [UserController::class, 'index'])->name('user');

Route::post('/api/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/api/dashboard', function () {
        return response()->json([
            'jumlah' => \App\Models\Siswa::count(),
            'diterima' => \App\Models\Siswa::where('status', 'diterima')->count(),
            'ditolak' => \App\Models\Siswa::where('status', 'ditolak')->count(),
        ]);
    });

    Route::get('/api/siswa', [SiswaController::class, 'index']);
    Route::post('/api/siswa', [SiswaController::class, 'store']);
});
