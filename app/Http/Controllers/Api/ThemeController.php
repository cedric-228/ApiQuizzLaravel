<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return \App\Models\Theme::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'phase_id' => 'required|exists:phases,id',
        ]);
        $theme = \App\Models\Theme::create($validated);
        return response()->json($theme, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    return \App\Models\Theme::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $theme = \App\Models\Theme::findOrFail($id);
        $validated = $request->validate([
            'title' => 'string',
            'phase_id' => 'exists:phases,id',
        ]);
        $theme->update($validated);
        return $theme;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $theme = \App\Models\Theme::findOrFail($id);
    $theme->delete();
    return response()->json(null, 204);
    }
}
