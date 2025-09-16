<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'pegawai_id',
        'tanggal',
        'status',
        'keterangan',
        'cuti_id', // tambahkan ini
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function cuti()
    {
        return $this->belongsTo(Cuti::class, 'cuti_id');
    }
}
