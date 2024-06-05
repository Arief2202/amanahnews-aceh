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
        tagname::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Aceh',
            'slug' => 'aceh',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Pemuda',
            'slug' => 'pemuda',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Internet',
            'slug' => 'internet',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Info',
            'slug' => 'info',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Mahasiswa',
            'slug' => 'mahasiswa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Pelajar',
            'slug' => 'pelajar',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Kreativitas',
            'slug' => 'kreativitas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        tagname::create([
            'name' => 'Prestasi',
            'slug' => 'prestasi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
