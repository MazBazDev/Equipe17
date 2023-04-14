<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "start",
        "end",
        "team_id",
        "max_players",
    ];

    protected $catst = [
        "start" => "datetime",
        "end" => "datetime",
    ];

    public function owner() : BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
} 
