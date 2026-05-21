<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Magazine;    // Importa il modello Magazine

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tabella magazine con riviste di esempio
        $magazines = [
            ['name'=> 'Shonen Jump' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Magazine' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Sunday' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Ace' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Gangan' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Champion' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Sirius' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Jump Plus' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Jump Alpha' , 'nationality'=> 'JP'],
            ['name'=> 'Shonen Jump Next' , 'nationality'=> 'JP'],
        ];
        foreach ($magazines as $magazine) {
            Magazine::create($magazine); // Crea rivista nel database
        }       
    }
}
