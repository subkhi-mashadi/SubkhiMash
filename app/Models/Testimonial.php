<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'role', 'quote_id', 'quote_en', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
