<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'personal_team',
        'user_id',
    ];

    protected $casts = [
        'personal_team' => 'boolean',
    ];
} 