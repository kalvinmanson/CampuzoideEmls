<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('questions', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('section_id');
        $table->foreign('section_id')->references('id')->on('sections');
        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->string('name');
        $table->text('description')->nullable();
        $table->text('feedback')->nullable();
        $table->string('response_a')->nullable();
        $table->string('response_b')->nullable();
        $table->string('response_c')->nullable();
        $table->string('response_d')->nullable();
        $table->integer('correct')->default(1);
        $table->integer('wins')->default(0);
        $table->integer('fails')->default(0);
        $table->float('rank')->default(0);
        $table->integer('views')->default(0);
        $table->integer('time')->default(1);
        $table->boolean('reported')->default(false);
        $table->text('reported_comment')->nullable();
        $table->boolean('active')->default(false);
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
        Schema::dropIfExists('questions');
    }
}
