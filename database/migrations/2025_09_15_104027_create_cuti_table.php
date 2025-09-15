<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('pegawai_id');
             $table->date('tanggal_mulai');
             $table->date('tanggal_selesai');
             $table->enum('jenis_cuti', ['Tahunan', 'Melahirkan', 'Lainnya']);
             $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');
             $table->string('keterangan')->nullable();

            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti');
    }
};
