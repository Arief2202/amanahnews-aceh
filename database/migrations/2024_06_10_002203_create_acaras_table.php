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
        Schema::create('acaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('poster');
            $table->string('title');
            $table->string('slug');
            $table->string('penyelenggara');
            $table->text('deskripsi');
            $table->timestamp('start_daftar_date')->nullable();
            $table->timestamp('end_daftar_date')->nullable();
            $table->timestamp('start_daftar_time')->nullable();
            $table->timestamp('end_daftar_time')->nullable();
            $table->timestamp('start_acara_date')->useCurrent();
            $table->timestamp('end_acara_date')->nullable();
            $table->timestamp('start_acara_time')->useCurrent();
            $table->timestamp('end_acara_time')->nullable();
            $table->string('lokasi');
            $table->string('nama_pj');
            $table->string('nomor_pj');
            $table->string('hubungi_kami');
            $table->string('sosial_media');
            $table->string('peta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
