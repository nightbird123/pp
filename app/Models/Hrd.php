<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hrd extends Model
{
    protected $table = 'hrd';

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'departemen_id',
        'email',
        'no_hp',
        'alamat',
        'status',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

public function pegawai()
{
    return $this->hasMany(Pegawai::class, 'departemen_id', 'departemen_id');
}

}
