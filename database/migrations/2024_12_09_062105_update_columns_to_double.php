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
        Schema::table('meals', function (Blueprint $table) {
            $table->decimal('pph', 12, 2)->change();
            $table->decimal('kotor', 12, 2)->change();
            $table->decimal('potongan', 12, 2)->change();
            $table->decimal('bersih', 12, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meals', function (Blueprint $table) {
            $table->decimal('pph', 8, 2)->change();
            $table->decimal('kotor', 8, 2)->change();
            $table->decimal('potongan', 8, 2)->change();
            $table->decimal('bersih', 8, 2)->change();
        });
    }
};
