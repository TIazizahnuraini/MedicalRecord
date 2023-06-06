<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pasien', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'jenis_registrasi', 'no_bpjs', 'no_hp', 'tgl_registrasi', 'agama', 'pekerjaan'
    ];
}
