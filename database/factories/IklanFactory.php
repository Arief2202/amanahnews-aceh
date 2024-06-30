<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Iklan>
 */
class IklanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = rand(0, 1) == 1 ? "persegi" : "panjang";
        return [
            'title' => fake()->sentence(4),
            'image' => ($type == "panjang" ? "p1.JPG" : "k".rand(1,9).".JPG"),
            'type' => $type,
            'show' => '1',
            'href' => 'https://www.instagram.com/amanah_aceh?igsh=MTIyd3B6OHkyemMyZQ==',
            'click' => rand(10,10000),
        ];
    }
}
