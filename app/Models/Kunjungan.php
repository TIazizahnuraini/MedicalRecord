<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $fillable = ['poli_id', 'pasien_id', 'dokter_id', 'tgl_kunjungan', 'jenis_kunjungan', 'tindak_lanjut', 'keluhan', 'terapi', 'kesadaran', 'tb', 'bb', 'tekanan_darah', 'respiratory_rake', 'heart_rafe', 'keterangan','biaya', 'status', 'resep','diagnosa_id'];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    // protected $casts = [
    //     'nama_obat' => 'array'
    // ];

    public function obats(){
        return $this->belongsToMany(Obat::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'pasien_id');
    }
}
