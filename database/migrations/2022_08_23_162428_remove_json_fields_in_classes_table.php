<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropColumn('prof_bonus');
            $table->dropColumn('spell_slots');
            $table->dropColumn('spells');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->json('prof_bonus')->default(new Expression('(JSON_ARRAY())'));
            $table->json('spell_slots')->default(new Expression('(JSON_ARRAY())'));
            $table->json('spells')->default(new Expression('(JSON_ARRAY())'));
        });
    }
};
