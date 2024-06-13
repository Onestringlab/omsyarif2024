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
    Schema::create('allowances', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('month_id');
      $table->string('nip');
      $table->string('nmpeg');
      $table->string('npwp')->nullable();
      $table->string('rekening')->nullable();
      $table->string('nmbankspan')->nullable();
      $table->integer('gjpokok')->nullable();
      $table->integer('tjistri')->nullable();
      $table->integer('tjanak')->nullable();
      $table->integer('tjupns')->nullable();
      $table->integer('tjstruk')->nullable();
      $table->integer('tjfungs')->nullable();
      $table->integer('tjdaerah')->nullable();
      $table->integer('tjpencil')->nullable();
      $table->integer('tjlain')->nullable();
      $table->integer('tjkompen')->nullable();
      $table->integer('pembul')->nullable();
      $table->integer('tjberas')->nullable();
      $table->integer('tjpph')->nullable();
      $table->integer('tottun')->nullable();
      $table->integer('kotor')->nullable();
      $table->integer('potpfkbul')->nullable();
      $table->integer('potpfk2')->nullable();
      $table->integer('potpfk10')->nullable();
      $table->integer('potpph')->nullable();
      $table->integer('potswrum')->nullable();
      $table->integer('potkelbtj')->nullable();
      $table->integer('potlain')->nullable();
      $table->integer('pottabrum')->nullable();
      $table->integer('totpot')->nullable();
      $table->integer('bersih')->nullable();
      $table->integer('bpjs')->nullable();
      $table->integer('bpjs2')->nullable();
      $table->timestamps();
      $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('allowances');
  }
};
