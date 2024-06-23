<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        User::factory()->create([
            'name' => 'Arief',
            'email' => 'arief.d2202@gmail.com',
            'photo' => 'user.png',
            'instance' => 'Politeknik Elektronika Negeri Surabaya',
            'password' => Hash::make('password'),
            'role' => '1'
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'photo' => 'user.png',
            'instance' => 'Admin Amanah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => '1'
        ]);
        User::factory()->create([
            'name' => 'Super Admin',
            'photo' => 'user.png',
            'instance' => 'Super Admin Amanah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('superadmin'),
            'role' => '2'
        ]);

        
        $this->call(CategorySeeder::class);
        $this->call(ECatalogSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostVideoSeeder::class);
        $this->call(TagnameSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(AcaraSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(ApaKataMerekaSeeder::class);
    }
}
