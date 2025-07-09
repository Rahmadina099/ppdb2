<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
 use HasFactory;

 protected $fillable = ['nama','nisn','jk','tanggal_lahir','alamat'];
 protected $table = ['siswa'];
}
