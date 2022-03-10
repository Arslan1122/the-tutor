<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tuition_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamp('class_date')->nullable();
            $table->string('class_time')->nullable();
            $table->text('meet_link')->nullable();
            $table->timestamps();

            $table->foreign('tuition_id')->references('id')->on('tuitions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuition_schedules');
    }
}
