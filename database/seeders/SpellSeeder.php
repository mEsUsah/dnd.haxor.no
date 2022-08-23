<?php

namespace Database\Seeders;

use App\Models\Spell;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Spell::factory()->count(5)->create();
    }
}
