<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tagname;

class TagnameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tagname::factory()->create([
            'name' => 'Teknologi',
        ]);
        Tagname::factory()->create([
            'name' => 'Aceh',
        ]);
        Tagname::factory()->create([
            'name' => 'Pemuda',
        ]);
        Tagname::factory()->create([
            'name' => 'Internet',
        ]);
        Tagname::factory()->create([
            'name' => 'Info',
        ]);
        Tagname::factory()->create([
            'name' => 'Mahasiswa',
        ]);
        Tagname::factory()->create([
            'name' => 'Pelajar',
        ]);
        Tagname::factory()->create([
            'name' => 'Kreativitas',
        ]);
        Tagname::factory()->create([
            'name' => 'Prestasi',
        ]);
    }
}
