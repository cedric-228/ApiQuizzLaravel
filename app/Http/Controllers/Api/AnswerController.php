<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = request()->query('user_id');
        $query = \App\Models\Answer::query();
        if ($userId) {
            $query->where('user_id', $userId);
        }
        return $query->get();
    }

    /**
     * Calculer le score total d'un utilisateur
     */
    public function score(Request $request, $userId)
    {
        $answers = \App\Models\Answer::where('user_id', $userId)->get();
        $score = 0;
        foreach ($answers as $answer) {
            $question = \App\Models\Question::find($answer->question_id);
            if ($question && $answer->selected_option === $question->correct_option_index) {
                // Récupérer le thème, puis la phase pour le pointValue
                $theme = \App\Models\Theme::find($question->theme_id);
                if ($theme) {
                    $phase = \App\Models\Phase::find($theme->phase_id);
                    if ($phase) {
                        $score += $phase->point_value;
                    }
                }
            }
        }
        return response()->json(['user_id' => $userId, 'score' => $score]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'question_id' => 'required|exists:questions,id',
            'selected_option' => 'required|integer',
            'is_correct' => 'boolean',
        ]);
        $answer = \App\Models\Answer::create($validated);
        return response()->json($answer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    return \App\Models\Answer::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $answer = \App\Models\Answer::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'question_id' => 'exists:questions,id',
            'selected_option' => 'integer',
            'is_correct' => 'boolean',
        ]);
        $answer->update($validated);
        return $answer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $answer = \App\Models\Answer::findOrFail($id);
    $answer->delete();
    return response()->json(null, 204);
    }
}
