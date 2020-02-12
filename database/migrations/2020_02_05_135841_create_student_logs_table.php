<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('card_code');
            $table->boolean('is_logged_in');
            $table->string('log_timestamp');
            $table->string('log_day')->nullable();
            $table->string('log_month')->nullable();
            $table->string('log_year')->nullable();
            $table->string('log_hour')->nullable();
            $table->string('log_min')->nullable();
            $table->string('log_sec')->nullable();
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
        Schema::dropIfExists('student_logs');
    }
}
