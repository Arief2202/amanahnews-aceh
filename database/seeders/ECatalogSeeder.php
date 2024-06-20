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
        ECatalog::factory(50)->create();
    }
}
