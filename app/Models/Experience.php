<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company', 'role_id', 'role_en', 'type_id', 'type_en',
        'points_id', 'points_en', 'started_at', 'ended_at', 'is_active',
    ];

    protected $casts = [
        'points_id' => 'array',
        'points_en' => 'array',
        'started_at' => 'date',
        'ended_at' => 'date',
        'is_active' => 'boolean',
    ];

    public function periodLabel(): string
    {
        $start = $this->started_at?->translatedFormat('M Y');
        $end = $this->ended_at?->translatedFormat('M Y') ?? __('portfolio.experience.present');

        return trim("{$start} - {$end}");
    }
}
