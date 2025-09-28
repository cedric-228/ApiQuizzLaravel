<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    protected $fillable = [
        'title',
        'description',
        'point_value',
    ];

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
