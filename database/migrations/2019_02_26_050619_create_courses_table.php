<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('courses', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('category')->nullable();
        $table->text('description')->nullable();
        $table->string('icon')->nullable();
        $table->string('picture')->nullable();
        $table->string('color')->nullable();
        $table->string('mode')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
