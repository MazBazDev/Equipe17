<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMatches extends Model
{
    use HasFactory;
    protected $table = 'user_matches';
    protected $fillable = [
        'id',
        'role',
        'side',
        'matches_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
