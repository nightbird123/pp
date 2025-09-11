<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            // cukup ubah jadi nullable, jangan tambahkan unique lagi
            $table->string('email')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            // rollback ke NOT NULL
            $table->string('email')->nullable(false)->change();
        });
    }
};
