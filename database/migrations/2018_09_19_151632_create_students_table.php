<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('name');
            $table->string('lastname');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('fathers_firstname')->nullable();
            $table->string('fathers_lastname')->nullable();
            $table->string('fathers_phone')->nullable();
            $table->string('fathers_cell_phone')->nullable();
            $table->string('mothers_firstname')->nullable();
            $table->string('mothers_lastname')->nullable();
            $table->string('mothers_phone')->nullable();
            $table->string('mothers_cell_phone')->nullable();
            $table->string('other_firstname')->nullable();
            $table->string('other_lastname')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('other_cell_phone')->nullable();
            $table->double('lat', 8, 6)->nullable();
            $table->double('lng', 8, 6)->nullable();
            $table->timestamps();
        });

        DB::update("ALTER TABLE students AUTO_INCREMENT = 1;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
