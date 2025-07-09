<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SiswaController;
use App\Models\Siswa;

use function response;

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
            'jumlah' => Siswa::count(),
            'diterima' => Siswa::where('status', 'diterima')->count(),
            'ditolak' => Siswa::where('status', 'ditolak')->count(),
        ]);
    });
});

// Data siswa (list dan tambah)
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);
