<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'phase_id',
        'title',
    ];

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
