<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = ['nama_obat', 'jumlah', 'satuan', 'dosis', 'expired'];

    // public function detailData($id)
    // {
    //     return DB::table('obats')->where('id', $id)-> first();
    // }

    public function kunjungans(){
        return $this->belongsToMany(Kunjungan::class);
    }

}
