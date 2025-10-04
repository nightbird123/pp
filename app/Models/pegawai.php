<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nip', 
        'nama', 
        'alamat', 
        'email', 
        'no_telp', 
        'tanggal_masuk', 
        'jabatan', 
        'departemen_id',
        'hrd_id' 
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function hrd()
    {
        return $this->belongsTo(Hrd::class, 'hrd_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'pegawai_id');
    }
     
    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'pegawai_id');
    }
}
