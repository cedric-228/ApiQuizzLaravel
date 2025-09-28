<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return \App\Models\Phase::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'point_value' => 'integer',
        ]);
        $phase = \App\Models\Phase::create($validated);
        return response()->json($phase, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    return \App\Models\Phase::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $phase = \App\Models\Phase::findOrFail($id);
        $validated = $request->validate([
            'title' => 'string',
            'description' => 'nullable|string',
            'point_value' => 'integer',
        ]);
        $phase->update($validated);
        return $phase;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $phase = \App\Models\Phase::findOrFail($id);
    $phase->delete();
    return response()->json(null, 204);
    }
}
