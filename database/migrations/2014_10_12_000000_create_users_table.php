<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
<<<<<<< HEAD
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('external_table_id');
            $table->integer('user_category');
            $table->rememberToken();
            $table->timestamps();
=======
            $table->integer('school_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(false);
            $table->string('activation_token');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
