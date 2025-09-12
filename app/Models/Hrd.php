<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hrd extends Model
{
    protected $table = 'hrd'; // jangan pakai "hrds"
    protected $fillable = [
        'nama', 'nip', 'jabatan', 'departemen_id',
        'email', 'no_hp', 'alamat', 'status'
    ];

    // Relasi ke Departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'hrd_id');
    }
}
