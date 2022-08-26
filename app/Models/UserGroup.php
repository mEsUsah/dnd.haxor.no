<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserGroup extends Model
{
    use HasFactory;

    // protected $table = 'user_groups';
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
