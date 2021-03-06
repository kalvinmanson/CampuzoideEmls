<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sections', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('course_id');
        $table->foreign('course_id')->references('id')->on('courses');
        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('video')->nullable();
        $table->longtext('content')->nullable();
        $table->longtext('activity')->nullable();
        $table->integer('sorted')->default(0);
        $table->float('rank')->default(0);
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
        Schema::dropIfExists('sections');
    }
}
