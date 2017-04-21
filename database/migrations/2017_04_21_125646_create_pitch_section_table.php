<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitchSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitch_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('row_start');
            $table->integer('row_end');
            $table->integer('column_start');
            $table->integer('column_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pitch_sections');
    }
}
