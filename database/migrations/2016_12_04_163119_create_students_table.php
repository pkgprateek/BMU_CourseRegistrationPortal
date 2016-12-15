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
           $table->string('registration_id')->unique();
           $table->string('name');
           $table->string('email')->unique();
           $table->unsignedSmallInteger('batch_year');
           $table->string('specialization');
           $table->string('contact')->nullable();
           $table->integer('faculty_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
