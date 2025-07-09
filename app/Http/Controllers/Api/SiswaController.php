<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        // Jika frontend butuh data terurut terbaru
        $siswas = Siswa::orderBy('created_at', 'desc')->get();

        // Jika frontend butuh format tertentu, bisa diubah di sini
        return response()->json([
            'success' => true,
            'data' => $siswas
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|unique:siswas,nisn',
            'jk' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
        ]);

        $siswa = Siswa::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Siswa berhasil ditambahkan',
            'data' => $siswa
        ], 201);
    }
}
