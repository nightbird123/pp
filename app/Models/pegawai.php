<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nip', 'nama', 'alamat', 'email', 'no_telp', 
        'tanggal_masuk', 'jabatan', 'departemen_id'
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
