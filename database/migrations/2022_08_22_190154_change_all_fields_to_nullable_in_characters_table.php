<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->change();
            $table->string('name')->nullable()->change();
            $table->integer('race_id')->nullable()->change();
            $table->integer('class_id')->nullable()->change();
            $table->integer('class_lvl')->nullable()->change();
            $table->integer('hp_max')->nullable()->change();
            $table->integer('hp_cur')->nullable()->change();
            $table->integer('str')->nullable()->change();
            $table->integer('dex')->nullable()->change();
            $table->integer('con')->nullable()->change();
            $table->integer('int')->nullable()->change();
            $table->integer('wis')->nullable()->change();
            $table->integer('cha')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('characters', function (Blueprint $table) {
            $table->integer('user_id')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
            $table->integer('race_id')->nullable(false)->change();
            $table->integer('class_id')->nullable(false)->change();
            $table->integer('class_lvl')->nullable(false)->change();
            $table->integer('hp_max')->nullable(false)->change();
            $table->integer('hp_cur')->nullable(false)->change();
            $table->integer('str')->nullable(false)->change();
            $table->integer('dex')->nullable(false)->change();
            $table->integer('con')->nullable(false)->change();
            $table->integer('int')->nullable(false)->change();
            $table->integer('wis')->nullable(false)->change();
            $table->integer('cha')->nullable(false)->change();
        });
    }
};
