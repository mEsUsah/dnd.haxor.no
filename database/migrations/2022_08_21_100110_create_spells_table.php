<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->integer('level');
            $table->integer('school_id');
            $table->integer('casting_time');
            $table->integer('form');
            $table->integer('range');
            $table->integer('duration');
            $table->json('comp')->default(new Expression('(JSON_ARRAY())'));
            $table->string('comp_spec')->default("");
            $table->string('desc_en')->default("");
            $table->string('desc_no')->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spells');
    }
};
