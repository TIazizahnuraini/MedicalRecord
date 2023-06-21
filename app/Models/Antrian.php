<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrians';

    protected $fillable = ['poli_id', 'pasien_id', 'dokter_id', 'status', 'tanggal', 'nomor_antrian'];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'pasien_id');
    }
}