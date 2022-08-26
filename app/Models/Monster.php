<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'challange',
        'traits',
        'alignment',
    ];
}
