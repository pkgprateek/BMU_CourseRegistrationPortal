<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registration_id')->unique();
            $table->string('name');
            $table->integer('batch');
            $table->string('branch');
            $table->integer('semester');
            $table->tinyInteger('verify_status')->dafault(0);
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
        Schema::dropIfExists('form_registrations');
    }
}
