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
        'hrd_id' // tambahin biar bisa mass assignment
    ];

    // Relasi ke Departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    // Relasi ke HRD
    public function hrd()
    {
        return $this->belongsTo(Hrd::class, 'hrd_id');
    }
}
