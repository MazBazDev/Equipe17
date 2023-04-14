<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMatchs extends Model
{
    use HasFactory;
    protected $fillable = ['player_id', 'match_id', 'side'];
    protected $table = 'user_match';
}
