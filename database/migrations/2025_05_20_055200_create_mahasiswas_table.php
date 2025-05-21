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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string("nm_mahasiswa");
            $table->string("nim")->unique();
            $table->float("nilai_rata_rata");
            $table->foreignId("prodis_id")->constrained("prodis",indexName:"mahasiswa_prodi_id")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("foto");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
