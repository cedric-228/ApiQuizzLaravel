<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return \App\Models\Question::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'text' => 'required|string',
            'options' => 'required|array',
            'correct_option_index' => 'required|integer',
        ]);
        $validated['options'] = json_encode($validated['options']);
        $question = \App\Models\Question::create($validated);
        return response()->json($question, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    return \App\Models\Question::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = \App\Models\Question::findOrFail($id);
        $validated = $request->validate([
            'theme_id' => 'exists:themes,id',
            'text' => 'string',
            'options' => 'array',
            'correct_option_index' => 'integer',
        ]);
        if(isset($validated['options'])) {
            $validated['options'] = json_encode($validated['options']);
        }
        $question->update($validated);
        return $question;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $question = \App\Models\Question::findOrFail($id);
    $question->delete();
    return response()->json(null, 204);
    }
}
