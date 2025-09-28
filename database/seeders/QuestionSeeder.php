<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = \App\Models\Theme::all();
        foreach ($themes as $theme) {
            \App\Models\Question::insert([
                [
                    'theme_id' => $theme->id,
                    'text' => 'Quelle est la capitale de la France?',
                    'options' => json_encode(['Paris', 'Lyon', 'Marseille', 'Toulouse']),
                    'correct_option_index' => 0,
                ],
                [
                    'theme_id' => $theme->id,
                    'text' => 'Combien font 2 + 2?',
                    'options' => json_encode(['3', '4', '5', '6']),
                    'correct_option_index' => 1,
                ],
                [
                    'theme_id' => $theme->id,
                    'text' => 'Qui a découvert l’Amérique?',
                    'options' => json_encode(['Christophe Colomb', 'Napoléon', 'Jules César', 'Louis XIV']),
                    'correct_option_index' => 0,
                ],
            ]);
        }
    }
}
