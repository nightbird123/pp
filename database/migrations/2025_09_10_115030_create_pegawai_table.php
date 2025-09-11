<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('alamat')->nullable();
           $table->string('email')->nullable();

            $table->string('no_telp')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('jabatan')->nullable();
            $table->unsignedBigInteger('departemen_id')->nullable();
            $table->foreign('departemen_id')->references('id')->on('departemen')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
