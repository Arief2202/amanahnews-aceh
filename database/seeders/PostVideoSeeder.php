<?php

namespace Database\Seeders;

use App\Models\PostVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostVideo::factory(rand(100,1000))->create();
    }
}
