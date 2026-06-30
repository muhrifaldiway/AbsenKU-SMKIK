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
        Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->string('nama_sekolah');
        $table->string('latitude'); // Titik koordinat Y
        $table->string('longitude'); // Titik koordinat X
        $table->integer('radius'); // Jarak maksimal dalam Meter (M)
        $table->time('jam_masuk'); // Batas jam masuk
        $table->time('jam_pulang'); // Batas jam pulang
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
