<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    // biar Laravel gak auto jadi "absensis"
    protected $table = 'absensi';

    protected $fillable = [
        'pegawai_id',
        'tanggal',
        'status',
        'keterangan'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
