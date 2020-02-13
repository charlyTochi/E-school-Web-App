<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('first_name');
          $table->string('last_name');
          $table->string('class_assigned');
          $table->string('school_id');
          $table->string('email');
          $table->string('address');
          $table->string('phone_number');
          $table->boolean('active')->default('true');
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
        Schema::dropIfExists('teachers');
    }
}
