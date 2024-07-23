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
        Schema::create('pendaftaran_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('id_kamar');
            $table->string('id_user');
            $table->string('id_poli');
            $table->string('tanggal');
            $table->string('keluhan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_pasiens');
    }
};
