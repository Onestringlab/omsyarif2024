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
        Schema::table('grands', function (Blueprint $table) {
            $table->string('npwp')->nullable()->change();
            $table->string('panggol')->nullable()->change();
            $table->string('jabatan')->nullable()->change();
            $table->string('grad')->nullable()->change();
            $table->string('maxmedmin')->nullable()->change();
            $table->integer('tunjangan')->nullable()->change();
            $table->float('potabs')->nullable()->change();
            $table->float('potkim')->nullable()->change();
            $table->integer('jumlahpot')->nullable()->change();
            $table->integer('jumtunjsetpot')->nullable()->change();
            $table->integer('tunjpph')->nullable()->change();
            $table->integer('bruto')->nullable()->change();
            $table->integer('potpph')->nullable()->change();
            $table->integer('netto')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grands', function (Blueprint $table) {
            $table->string('npwp')->nullable(false)->change();
            $table->string('panggol')->nullable(false)->change();
            $table->string('jabatan')->nullable(false)->change();
            $table->string('grad')->nullable(false)->change();
            $table->string('maxmedmin')->nullable(false)->change();
            $table->integer('tunjangan')->nullable(false)->change();
            $table->float('potabs')->nullable(false)->change();
            $table->float('potkim')->nullable(false)->change();
            $table->integer('jumlahpot')->nullable(false)->change();
            $table->integer('jumtunjsetpot')->nullable(false)->change();
            $table->integer('tunjpph')->nullable(false)->change();
            $table->integer('bruto')->nullable(false)->change();
            $table->integer('potpph')->nullable(false)->change();
            $table->integer('netto')->nullable(false)->change();
        });
    }
};
