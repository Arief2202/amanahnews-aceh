<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iklans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('type')->default('persegi');
            $table->string('href')->default('https://www.instagram.com/amanah_aceh?igsh=MTIyd3B6OHkyemMyZQ==');
            $table->integer('show')->default(1);
            $table->string('click')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iklans');
    }
};
