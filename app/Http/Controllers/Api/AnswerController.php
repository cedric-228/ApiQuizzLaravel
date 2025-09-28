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
    return \App\Models\Answer::all();
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
