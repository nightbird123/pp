<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
     Schema::create('hrd', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('nip')->nullable();
    $table->string('jabatan')->nullable();
    $table->unsignedBigInteger('departemen_id')->nullable();
    $table->string('email')->nullable();
    $table->string('no_hp', 20)->nullable();
    $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
    $table->timestamps();
});


        // Tambahkan foreign key ke tabel pegawai
        Schema::table('pegawai', function (Blueprint $table) {
            $table->foreignId('hrd_id')
                  ->nullable()
                  ->constrained('hrd') // relasi ke tabel hrd
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        // Hapus relasi di pegawai
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropForeign(['hrd_id']);
            $table->dropColumn('hrd_id');
        });

        Schema::dropIfExists('hrd');
    }
};
