<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
protected $table = 'departemen'; 
    protected $fillable = ['nama_departemen'];

   public function pegawai()
{
    return $this->hasMany(Pegawai::class, 'departemen_id');
}

}


