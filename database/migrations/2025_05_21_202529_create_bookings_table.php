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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string("nm_pasien");
            $table->foreignId("dokter_id")->constrained("dokters",indexName:"booking_dokter_id")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("hari");
            $table->time("jam_awal");
            $table->time("jam_akhir");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
