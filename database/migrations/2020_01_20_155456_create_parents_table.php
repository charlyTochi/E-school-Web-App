<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('phone_number');
          $table->string('address');
          $table->string('sex');
          $table->string('occupation');
          $table->string('state_of_origin');
          $table->string('school_id');
          $table->string('email');
          $table->string('parent_name');
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
        Schema::dropIfExists('parents');
    }
}
