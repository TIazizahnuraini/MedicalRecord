<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganObat extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_obat';

    protected $fillable = ['kunjungan_id', 'obat_id', 'jumlah'];

    public function obat(){
        return $this->belongsTo(Obat::class);
    }

    public function kunjungan(){
        return $this->belongsTo(Kunjungan::class);
    }
}
