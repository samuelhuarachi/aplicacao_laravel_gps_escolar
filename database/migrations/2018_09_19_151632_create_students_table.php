<?php

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
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('name');
            $table->string('lastname')->default('');
            $table->integer('age')->default(0);
            $table->string('gender')->default('');
            $table->string('phone')->default('');
            $table->string('cell_phone')->default('');
            $table->string('street')->default('');
            $table->string('number')->default('');
            $table->string('complement')->default('');
            $table->string('neighborhood')->default('');
            $table->string('zipcode')->default('');
            $table->string('city')->default('');
            $table->string('state')->default('');
            $table->string('fathers_firstname')->default('');
            $table->string('fathers_lastname')->default('');
            $table->string('fathers_phone')->default('');
            $table->string('fathers_cell_phone')->default('');
            $table->string('mothers_firstname')->default('');
            $table->string('mothers_lastname')->default('');
            $table->string('mothers_phone')->default('');
            $table->string('mothers_cell_phone')->default('');
            $table->string('other_firstname')->default('');
            $table->string('other_lastname')->default('');
            $table->string('other_phone')->default('');
            $table->string('other_cell_phone')->default('');
            $table->double('lat', 8, 6)->default(0);
            $table->double('lng', 8, 6)->default(0);
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
        Schema::dropIfExists('students');
    }
}
