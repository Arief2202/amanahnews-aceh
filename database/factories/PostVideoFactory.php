<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostVideo>
 */
class PostVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => '1',
            'category_id' => rand(1,4),
            'title' => fake()->sentence(5),
            'banner' => 'prestasi.png',
            'video' => '2wA_b6YHjqQ',
            'video_source' => fake()->sentence(5),
            'slug' => fake()->slug(),
            'content' => fake()->sentence(100),
            'view_total' => rand(0, 100),
            'view_monthly' => rand(0, 100),
            'view_weekly' => rand(0, 100),
            'view_daily' => rand(0, 100),
            'show' => '1',
            'last_reset_monthly' => date('Y-m-d H:i:s'),
            'last_reset_weekly' => date('Y-m-d H:i:s'),
            'last_reset_daily' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
