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
        Schema::create('apa_kata_merekas', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->default('user.png');
            $table->string('name');
            $table->string('instance');
            $table->longText('answer');
            $table->integer('star')->default(5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apa_kata_merekas');
    }
};
