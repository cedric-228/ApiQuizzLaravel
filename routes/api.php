<?php

use Illuminate\Support\Facades\Route;

// Utilisateurs
Route::apiResource('users', App\Http\Controllers\Api\UserController::class);
// Phases
Route::apiResource('phases', App\Http\Controllers\Api\PhaseController::class);
// Thèmes
Route::apiResource('themes', App\Http\Controllers\Api\ThemeController::class);
// Questions
Route::apiResource('questions', App\Http\Controllers\Api\QuestionController::class);
// Réponses
Route::apiResource('answers', App\Http\Controllers\Api\AnswerController::class);
