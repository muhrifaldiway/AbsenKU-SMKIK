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
        Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique(); // Ini pengganti NIP
        $table->string('google_id')->nullable();
        $table->string('password')->nullable(); // Nullable karena login Google tidak butuh pass
        $table->string('avatar')->nullable(); // Untuk menyimpan foto dari Google
        $table->enum('role', ['admin', 'guru'])->default('guru');
        $table->rememberToken();
        $table->timestamps();
    });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
