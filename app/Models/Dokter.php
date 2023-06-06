<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokter', 'id_ruang', 'jenis_kelamin', 'spesialis', 'tempat_lahir', 'tgl_lahir', 'alamat', 'nik', 'no_hp', 'sip'
    ];

    public function kunjungans()
    {
        return $this->hasMany(Dokter::class);
    }
}
