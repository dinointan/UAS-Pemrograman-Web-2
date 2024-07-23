<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekammedispasiens', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rekammedis');
            $table->string('tanggal');
            $table->string('diagnosa');
            $table->text('tindakan_medis');
            $table->foreignId('id_dokter')
                ->constrained('dokters')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_pasien')
                ->constrained('pasiens')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekammedispasiens');
    }
};
