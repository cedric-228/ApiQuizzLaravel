<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $questions = \App\Models\Question::all();
        foreach ($users as $user) {
            foreach ($questions as $question) {
                \App\Models\Answer::create([
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'selected_option' => $question->correct_option_index,
                    'is_correct' => true,
                ]);
            }
        }
    }
}
