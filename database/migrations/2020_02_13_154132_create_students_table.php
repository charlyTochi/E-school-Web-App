<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->bigIncrements('id');
          $table->string('firstname');
          $table->string('lastname');
          $table->string('sex');
          $table->string('father_id');
          $table->string('mother_id');
          $table->string('school_id');
          $table->string('class_name');
          $table->string('card_code');
          $table->date('date_of_birth');
          $table->string('nationality');
          $table->string('state_of_origin');
          $table->string('local_govt');
          $table->string('address');
          $table->string('religion');
          $table->string('primary_contact_id');
          $table->string('primary_contact_rel');
          $table->string('secondary_contact_id');
          $table->string('secondary_contact_rel');
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
