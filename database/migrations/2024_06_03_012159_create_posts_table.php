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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('banner');
            $table->string('banner_source');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->integer('view_total')->default(0);
            $table->integer('view_monthly')->default(0);
            $table->integer('view_weekly')->default(0);
            $table->integer('view_daily')->default(0);
            $table->integer('show')->default(0);
            $table->timestamp('last_reset_monthly')->useCurrent();
            $table->timestamp('last_reset_weekly')->useCurrent();
            $table->timestamp('last_reset_daily')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
