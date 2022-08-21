<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'speed',
        'size_id',
        'str_bonus',
        'dex_bonus',
        'con_bonus',
        'int_bonus',
        'wis_bonus',
        'cha_bonus'
    ];
}