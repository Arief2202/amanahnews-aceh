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
        Schema::create('e_catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('title');
            $table->string('slug');
            $table->string('price');
            $table->string('owner');
            $table->longText('description');
            $table->string('address');
            $table->string('hubungi');
            $table->string('sosmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_catalogs');
    }
};
