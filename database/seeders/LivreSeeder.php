<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livre;
class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Livre::create([
            'titre' => 'Livre 1',
            'description' => 'Description du livre 1',
            'chemin' => 'livre1.pdf',
            'corps' => 'inspecteur des impots',
        ]);
    
        Livre::create([
            'titre' => 'Livre 2',
            'description' => 'Description du livre 2',
            'chemin' => 'livre2.pdf',
            'corps' => 'inspecteur des impots',
        ]);
    }
}
