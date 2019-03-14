<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('results', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('section_id');
        $table->foreign('section_id')->references('id')->on('sections');
        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->string('attachment')->nullable();
        $table->longtext('content')->nullable();
        $table->integer('qualification')->default(0);
        $table->text('feedback')->nullable();
        $table->float('rank')->default(0);
        $table->integer('views')->default(0);
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
        Schema::dropIfExists('results');
    }
}
