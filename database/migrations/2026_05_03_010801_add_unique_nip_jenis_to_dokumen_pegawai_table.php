<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dokumen_pegawai', function (Blueprint $table) {
            $table->unique(['nip', 'jenis_dokumen'], 'dokumen_pegawai_nip_jenis_unique');
        });
    }

    public function down(): void
    {
        Schema::table('dokumen_pegawai', function (Blueprint $table) {
            $table->dropUnique('dokumen_pegawai_nip_jenis_unique');
        });
    }
};