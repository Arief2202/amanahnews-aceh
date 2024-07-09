<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foto>
 */
class FotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dateMin1 = Carbon::now()->subDays(rand(25,40));
        return [
            'user_id' => '1',
            'category_id' => rand(1,4),
            'title' => fake()->sentence(5),
            'banner' => 'prestasi.png',
            'banner_source' => fake()->sentence(5),
            'slug' => fake()->slug(),
            'content' => fake()->sentence(100),
            'view_total' => rand(0, 100),
            'view_monthly' => rand(0, 100),
            'view_weekly' => rand(0, 100),
            'view_daily' => rand(0, 100),
            'show' => '1',
            'last_reset_monthly' => $dateMin1,
            'last_reset_weekly' => $dateMin1,
            'last_reset_daily' => $dateMin1,
            'created_at' => date('Y-m-d H:i:s', strtotime('2024-06-20 20:41:20')),
            'updated_at' => date('Y-m-d H:i:s', strtotime('2024-06-19 19:41:20')),
        ];
    }
}
