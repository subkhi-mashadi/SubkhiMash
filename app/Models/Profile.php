<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'cv_path',
        'photo_path',
        'about_p1_id',
        'about_p1_en',
        'about_p2_id',
        'about_p2_en',
        'stat_projects',
        'stat_years',
        'stat_remote',
        'email',
        'whatsapp',
        'linkedin',
        'github',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}
