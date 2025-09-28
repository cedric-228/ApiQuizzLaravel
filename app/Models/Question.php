<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'theme_id',
        'text',
        'options',
        'correct_option_index',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
