<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);
        Category::factory()->create([
            'name' => 'Politik',
            'slug' => 'politik'
        ]);
        Category::factory()->create([
            'name' => 'Berita',
            'slug' => 'berita'
        ]);
        Category::factory()->create([
            'name' => 'Prestasi',
            'slug' => 'prestasi'
        ]);
        
    }
}
