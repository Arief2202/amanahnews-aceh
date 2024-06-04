<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tagname;

class TagnameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tagname::factory()->create([
            'name' => 'Teknologi',
        ]);
        tagname::factory()->create([
            'name' => 'Aceh',
        ]);
        tagname::factory()->create([
            'name' => 'Pemuda',
        ]);
        tagname::factory()->create([
            'name' => 'Internet',
        ]);
        tagname::factory()->create([
            'name' => 'Info',
        ]);
        tagname::factory()->create([
            'name' => 'Mahasiswa',
        ]);
        tagname::factory()->create([
            'name' => 'Pelajar',
        ]);
        tagname::factory()->create([
            'name' => 'Kreativitas',
        ]);
        tagname::factory()->create([
            'name' => 'Prestasi',
        ]);
    }
}
