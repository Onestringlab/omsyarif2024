<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyNipToKeluargaPegawaiTable extends Migration
{
    public function up()
    {
        Schema::table('keluarga_pegawai', function (Blueprint $table) {
            $table->string('nip', 191)->change();
            $table->foreign('nip')
                    ->references('nip')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('keluarga_pegawai', function (Blueprint $table) {
            $table->dropForeign(['nip']);
        });
    }
}