<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('form_id');
            $table->json('data')->nullable();
            $table->string('name_attribute');
            $table->decimal('score')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->softDeletes();
            $table->timestamps();

            if (Schema::hasTable('forms')) {
                $table->foreign('form_id')->on('forms')->references('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_details');
    }
}
