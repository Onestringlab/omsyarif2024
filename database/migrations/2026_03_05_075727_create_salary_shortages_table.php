<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salary_shortages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('month_id');
            $table->string('nip')->index();
            $table->string('nmpeg');
            $table->string('npwp')->nullable();
            $table->string('rekening')->nullable();
            $table->string('nmbankspan')->nullable();
            $table->bigInteger('gjpokok')->default(0);
            $table->bigInteger('tjistri')->default(0);
            $table->bigInteger('tjanak')->default(0);
            $table->bigInteger('tjupns')->default(0);
            $table->bigInteger('tjstruk')->default(0);
            $table->bigInteger('tjfungs')->default(0);
            $table->bigInteger('tjdaerah')->default(0);
            $table->bigInteger('tjpencil')->default(0);
            $table->bigInteger('tjlain')->default(0);
            $table->bigInteger('tjkompen')->default(0);
            $table->bigInteger('pembul')->default(0);
            $table->bigInteger('tjberas')->default(0);
            $table->bigInteger('tjpph')->default(0);
            $table->bigInteger('tottun')->default(0);
            $table->bigInteger('kotor')->default(0);
            $table->bigInteger('potpfkbul')->default(0);
            $table->bigInteger('potpfk2')->default(0);
            $table->bigInteger('potpfk10')->default(0);
            $table->bigInteger('potpph')->default(0);
            $table->bigInteger('potswrum')->default(0);
            $table->bigInteger('totpot')->default(0);
            $table->bigInteger('bersih')->default(0);
            $table->bigInteger('bpjs')->default(0);
            $table->bigInteger('bpjs2')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            // $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salary_shortages');
    }
};
