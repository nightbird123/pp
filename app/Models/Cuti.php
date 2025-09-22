<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';

    protected $fillable = [
        'pegawai_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis_cuti',   
        'status',
        'keterangan'
    ];

  public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'cuti_id');
    }
}
