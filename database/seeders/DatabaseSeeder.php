<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MagazineSeeder;  // Importa il seeder MagazineSeeder
use Database\Seeders\CategorySeeder;   // Importa il seeder CategorySeeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Esegue i seeder in ordine
        $this->call([
            CategorySeeder::class, //popola le categorie
            MagazineSeeder::class, //popola le riviste
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
