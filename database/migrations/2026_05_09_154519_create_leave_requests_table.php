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
        Schema::create('leave_requests', function (Blueprint $table) {
        $table->id(); // 
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // [cite: 47]
        $table->enum('type', ['sakit', 'izin']); // [cite: 47]
        $table->date('start_date'); // [cite: 48]
        $table->date('end_date'); // [cite: 48]
        $table->text('reason'); // [cite: 49]
        $table->string('attachment')->nullable(); // Bukti foto surat [cite: 49]
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // [cite: 50]
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
