<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phases = \App\Models\Phase::all();
        foreach ($phases as $phase) {
            \App\Models\Theme::insert([
                ['title' => 'Mathématiques', 'phase_id' => $phase->id],
                ['title' => 'Sciences', 'phase_id' => $phase->id],
                ['title' => 'Histoire', 'phase_id' => $phase->id],
            ]);
        }
    }
}
