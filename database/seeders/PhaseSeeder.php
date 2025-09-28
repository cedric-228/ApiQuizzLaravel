<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Phase::insert([
            [
                'title' => 'Débutant',
                'description' => 'Niveau débutant',
                'point_value' => 10,
            ],
            [
                'title' => 'Intermédiaire',
                'description' => 'Niveau intermédiaire',
                'point_value' => 20,
            ],
            [
                'title' => 'Avancé',
                'description' => 'Niveau avancé',
                'point_value' => 30,
            ],
        ]);
    }
}
