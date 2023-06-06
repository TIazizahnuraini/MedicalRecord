<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $fillable = ['nama_poli', 'jadwal_mulai', 'jadwal_selesai'];

    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
