<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ECatalog>
 */
class ECatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $number = fake()->phoneNumber();
        $number = str_replace("(", "", $number);
        $number = str_replace(")", "", $number);
        $number = str_replace(" ", "", $number);
        if($number[0] == '0'){
            $number[0] = "(";
            $number = str_replace("(", "", $number);
            $number = "+62".$number;
        }
        $photo = [
            'kopi-aceh.png',
            'kue-bhoi.png',
            'kue-keukarah.png',
            'rendang.png',
        ];
        return [
            'photo' => $photo[rand(0,3)],
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'price' => rand(1,20)*1000,
            'owner' => "Warung ".fake()->name(),
            'description' => fake()->sentence(rand(10,20)),
            'address' => fake()->address(),
            'hubungi' => 'https://wa.me/'.$number,
            'sosmed' => 'https://instagram.com/'.fake()->firstName().rand(100, 200),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
