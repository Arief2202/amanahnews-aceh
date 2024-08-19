<?php

namespace Database\Seeders;

use App\Models\ECatalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ECatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ECatalog::factory(rand(100,1000))->create();
    }
}
