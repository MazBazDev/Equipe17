<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function match()
    {
        return Matches::where("id", $this->matches_id)->first();
    }
}
