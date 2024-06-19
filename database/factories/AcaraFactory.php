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
        return [
            'user_id' => 1,
            'poster' => "acara1.png",
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'penyelenggara' => fake()->name(),
            'deskripsi' => fake()->sentence(30),
            'start_daftar_date' => rand(0, 1) == 1 ? date('Y-m-').rand(1, 15)." 00:00:00" : null,
            'end_daftar_date' =>(date('Y-m-').rand(15, 30)." 00:00:00"),
            'start_daftar_time' => date('Y-m-d ').rand(8, 12).date(':i:s'),
            'end_daftar_time' =>(date('Y-m-d ').rand(12, 18).date(':i:s')),
            'start_acara_date' => date('Y').'-'.rand(4, 8).'-'.rand(1, 15)." 00:00:00",
            'end_acara_date' =>rand(0, 5) == 1 ? (date('Y-m-').rand(15, 30)." 00:00:00"): null,
            'start_acara_time' => date('Y-m-d ').rand(8, 12).date(':i:s'),
            'end_acara_time' =>rand(0, 5) == 1 ? (date('Y-m-d ').rand(12, 18).date(':i:s')): null,
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
