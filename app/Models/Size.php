<?php

namespace App\Models;

use App\Models\Monster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;

    public function monsters()
    {
        return $this->hasMany(Monster::class);
    }
}
