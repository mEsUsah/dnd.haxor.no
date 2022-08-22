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
        Schema::table('spells', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->integer('level')->nullable()->change();
            $table->integer('school_id')->nullable()->change();
            $table->integer('casting_time')->nullable()->change();
            $table->integer('form')->nullable()->change();
            $table->integer('range')->nullable()->change();
            $table->integer('duration')->nullable()->change();
            $table->text('comp_spec')->nullable()->change();
            $table->text('desc_en')->nullable()->change();
            $table->text('desc_no')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spells', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->integer('level')->nullable(false)->change();
            $table->integer('school_id')->nullable(false)->change();
            $table->integer('casting_time')->nullable(false)->change();
            $table->integer('form')->nullable(false)->change();
            $table->integer('range')->nullable(false)->change();
            $table->integer('duration')->nullable(false)->change();
            $table->text('comp_spec')->nullable(false)->change();
            $table->text('desc_en')->nullable(false)->change();
            $table->text('desc_no')->nullable(false)->change();
        });
    }
};
