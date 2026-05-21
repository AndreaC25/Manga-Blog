<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;   // Importa il modello Category

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tabella categories con generi dei fumetti di esempio
        $categories = [
            ['name'=> 'Shonen'],
            ['name'=> 'Shojo'],
            ['name'=> 'Seinen'],
            ['name'=> 'Josei'],
            ['name'=> 'Kodomo'],
            ['name'=> 'Gekiga'],
            ['name'=> 'Yaoi'],
            ['name'=> 'Yuri'],
            ['name'=> 'Harem'],
            ['name'=> 'Isekai'],
        ];
        foreach ($categories as $name) {
            Category::create($name); // Crea categoria nel database
        }       
    }
}
