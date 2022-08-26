<?php

namespace App\Models;

use App\Models\Alignment;
use App\Models\Challenge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Monster extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'speed',
        'ac',
        'armor',
        'hp',
        'size_id',
        'str',
        'dex',
        'con',
        'int',
        'wis',
        'cha',
        'saves',
        'skills',
        'languages',
        'description',
        'actions',
        'challenge',
        'traits',
        'alignment',
    ];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function alignment()
    {
        return $this->belongsTo(Alignment::class);
    }
}
