<?php

namespace App\Models;

use App\Models\Spell;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharacterClass extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes';

    public function spells()
    {
        return $this->belongsToMany(Spell::class,'class_spell','class_id');
    }
}
