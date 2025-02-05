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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->Integer('km_tidur');
            $table->Integer('km_mandi');
            $table->float('row_jalan');
            $table->foreignId('peruntukan_id');
            $table->foreignId('bentuk_id');
            $table->foreignId('letak_id');
            $table->float('luas_tanah');
            $table->float('luas_bangunan');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('hasil_prediksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
