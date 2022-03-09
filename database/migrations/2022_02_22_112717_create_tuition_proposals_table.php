<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tuition_id');
            $table->unsignedBigInteger('teacher_id');
            $table->integer('teacher_price')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_accepted')->default(0);
            $table->timestamps();

            $table->foreign('tuition_id')->references('id')->on('tuitions')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuition_proposals');
    }
}
