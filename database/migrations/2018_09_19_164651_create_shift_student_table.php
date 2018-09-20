<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shift_id')->unsigned();
            $table->foreign('shift_id')->references('id')->on('shifts');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_student');
    }
}
