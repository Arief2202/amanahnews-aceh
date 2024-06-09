<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acara>
 */
class AcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $table->string('poster');
        // $table->string('title');
        // $table->string('slug');
        // $table->string('penyelenggara');
        // $table->string('deskripsi');
        // $table->timestamp('start_daftar')->nullable();
        // $table->timestamp('end_daftar')->nullable();
        // $table->timestamp('start_acara')->nullable();
        // $table->string('lokasi');
        // $table->string('nama_pj');
        // $table->string('nomor_pj');
        // $table->string('hubungi_kami');
        // $table->string('sosial_media');
        // $table->string('peta');
        // $table->timestamps();
        return [
            'user_id' => 1,
            'poster' => "acara1.png",
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'penyelenggara' => fake()->name(),
            'deskripsi' => fake()->sentence(30),
            'start_acara' => date('Y-m-').rand(1, 30).date(' H:i:s'),
            'lokasi' => fake()->sentence(3),
            'nama_pj' => fake()->name(),
            'nomor_pj' => fake()->phoneNumber(),
            'hubungi_kami' => "https://wa.me/+6281332145438",
            'sosial_media' => "https://instagram.com/ss_arief",
            'peta' => "https://maps.app.goo.gl/WT7KgRKX63FB6UyPA",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
