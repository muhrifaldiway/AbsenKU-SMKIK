<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->time('time_out')->nullable()->after('photo_in');
            $table->string('lat_out')->nullable()->after('time_out');
            $table->string('long_out')->nullable()->after('lat_out');
            $table->string('photo_out')->nullable()->after('long_out');
        });
    }

    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn(['time_out', 'lat_out', 'long_out', 'photo_out']);
        });
    }
};
