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
        Schema::create('postcontents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->string('post_type')->default('photo');
            $table->string('type')->default('text');
            $table->longText('content')->nullable();
            $table->text('image_width')->nullable();
            $table->text('image_height')->nullable();
            $table->text('source')->nullable();
            $table->text('href')->nullable();
            $table->integer('saved')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postcontents');
    }
};
