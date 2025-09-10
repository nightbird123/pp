<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{


    protected $fillable = ['judul', 'isi', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


