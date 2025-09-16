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
    Schema::table('absensi', function (Blueprint $table) {
        $table->unsignedBigInteger('cuti_id')->nullable()->after('pegawai_id');
        $table->foreign('cuti_id')->references('id')->on('cuti')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('absensi', function (Blueprint $table) {
        $table->dropForeign(['cuti_id']);
        $table->dropColumn('cuti_id');
    });
}

};
