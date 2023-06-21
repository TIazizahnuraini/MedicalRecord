<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'jenis_kelamin', 'alamat', 'jenis_registrasi', 'no_bpjs', 'no_hp', 'tgl_registrasi', 'agama', 'pekerjaan'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
