<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::factory()->create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);
        category::factory()->create([
            'name' => 'Politik',
            'slug' => 'politik'
        ]);
        category::factory()->create([
            'name' => 'Berita',
            'slug' => 'berita'
        ]);
        category::factory()->create([
            'name' => 'Prestasi',
            'slug' => 'prestasi'
        ]);
        
    }
}
