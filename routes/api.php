<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Endpoint login
Route::post('/login', [AuthController::class, 'login']);

// Endpoint yang membutuhkan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    // Dashboard data untuk frontend
    Route::get('/dashboard', function () {
        return response()->json([
            'jumlah' => \App\Models\Siswa::count(),
            'diterima' => \App\Models\Siswa::where('status', 'diterima')->count(),
            'ditolak' => \App\Models\Siswa::where('status', 'ditolak')->count(),
        ]);
    });

    // Data siswa (list dan tambah)
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa', [SiswaController::class, 'store']);
});
