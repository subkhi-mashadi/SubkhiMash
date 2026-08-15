<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'stack', 'github', 'live', 'cover_path',
        'problem_id', 'problem_en',
        'solution_id', 'solution_en',
        'result_id', 'result_en',
        'is_active',
    ];

    protected $casts = [
        'stack' => 'array',
        'is_active' => 'boolean',
    ];
}
