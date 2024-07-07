<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mitra>
 */
class MitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(4),
            'image' => "dummy.png",
            'show' => '1',
            'href' => 'https://www.instagram.com/amanah_aceh?igsh=MTIyd3B6OHkyemMyZQ==',
        ];
    }
}
