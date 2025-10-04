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
        // Thème 1 : Systèmes de numération
        $themeNum = \App\Models\Theme::where('title', 'Les systèmes de numération')->first();
        if ($themeNum) {
            \App\Models\Question::insert([
                [
                    'theme_id' => $themeNum->id,
                    'text' => 'Quel est le système de numération binaire ?',
                    'options' => json_encode(['Base 8', 'Base 2', 'Base 10', 'Base 16']),
                    'correct_option_index' => 1,
                ],
                [
                    'theme_id' => $themeNum->id,
                    'text' => 'Combien de chiffres différents dans le système décimal ?',
                    'options' => json_encode(['8', '10', '2', '16']),
                    'correct_option_index' => 1,
                ],
                [
                    'theme_id' => $themeNum->id,
                    'text' => 'Quel chiffre n’existe pas en binaire ?',
                    'options' => json_encode(['0', '1', '2', 'A']),
                    'correct_option_index' => 2,
                ],
            ]);
        }

        // Thème 2 : Boucles
        $themeBoucle = \App\Models\Theme::where('title', 'Les boucles')->first();
        if ($themeBoucle) {
            \App\Models\Question::insert([
                [
                    'theme_id' => $themeBoucle->id,
                    'text' => 'Quelle boucle est utilisée pour un nombre connu d\'itérations ?',
                    'options' => json_encode(['while', 'do-while', 'for', 'foreach']),
                    'correct_option_index' => 2,
                ],
                [
                    'theme_id' => $themeBoucle->id,
                    'text' => 'Quelle boucle s’exécute au moins une fois ?',
                    'options' => json_encode(['for', 'while', 'do-while', 'foreach']),
                    'correct_option_index' => 2,
                ],
                [
                    'theme_id' => $themeBoucle->id,
                    'text' => 'Quelle structure permet de parcourir une liste ?',
                    'options' => json_encode(['if', 'for', 'switch', 'break']),
                    'correct_option_index' => 1,
                ],
            ]);
        }

        // Thème 3 : Conditions
        $themeCond = \App\Models\Theme::where('title', 'Les conditions')->first();
        if ($themeCond) {
            \App\Models\Question::insert([
                [
                    'theme_id' => $themeCond->id,
                    'text' => 'Une condition if s\'écrit avec ?',
                    'options' => json_encode(['()', '{}', '[]', '<>']),
                    'correct_option_index' => 0,
                ],
                [
                    'theme_id' => $themeCond->id,
                    'text' => 'Quel mot-clé permet de tester plusieurs cas ?',
                    'options' => json_encode(['if', 'switch', 'for', 'while']),
                    'correct_option_index' => 1,
                ],
                [
                    'theme_id' => $themeCond->id,
                    'text' => 'Quel opérateur logique signifie "ET" ?',
                    'options' => json_encode(['||', '&&', '==', '!=']),
                    'correct_option_index' => 1,
                ],
            ]);
        }

        // Thème 4 : Fonctions et procédures
        $themeFunc = \App\Models\Theme::where('title', 'Fonctions et procédures')->first();
        if ($themeFunc) {
            \App\Models\Question::insert([
                [
                    'theme_id' => $themeFunc->id,
                    'text' => 'Quelle est la portée d\'une variable locale ?',
                    'options' => json_encode(['Globale', 'Locale à la fonction', 'Locale au fichier', 'Locale au package']),
                    'correct_option_index' => 1,
                ],
                [
                    'theme_id' => $themeFunc->id,
                    'text' => 'Comment s’appelle une fonction sans valeur de retour ?',
                    'options' => json_encode(['void', 'return', 'main', 'static']),
                    'correct_option_index' => 0,
                ],
                [
                    'theme_id' => $themeFunc->id,
                    'text' => 'Quel mot-clé permet de sortir d’une fonction ?',
                    'options' => json_encode(['break', 'continue', 'return', 'exit']),
                    'correct_option_index' => 2,
                ],
            ]);
        }

        // Thème 5 : POO
        $themePOO = \App\Models\Theme::where('title', 'Classes et objets')->first();
        if ($themePOO) {
            \App\Models\Question::insert([
                [
                    'theme_id' => $themePOO->id,
                    'text' => 'Qu\'est-ce qu\'une classe en POO ?',
                    'options' => json_encode(['Une fonction', 'Un type de données', 'Un objet', 'Une méthode']),
                    'correct_option_index' => 1,
                ],
                [
                    'theme_id' => $themePOO->id,
                    'text' => 'Quel mot-clé permet de créer un objet ?',
                    'options' => json_encode(['new', 'class', 'object', 'static']),
                    'correct_option_index' => 0,
                ],
                [
                    'theme_id' => $themePOO->id,
                    'text' => 'Comment appelle-t-on une fonction dans une classe ?',
                    'options' => json_encode(['méthode', 'variable', 'objet', 'champ']),
                    'correct_option_index' => 0,
                ],
            ]);
        }
    }
}
