<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pages', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('site_id');
        $table->foreign('site_id')->references('id')->on('sites');
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('category')->nullable();
        $table->string('picture')->nullable();
        $table->text('description')->nullable();
        $table->text('content')->nullable();
        $table->integer('weight')->default(0);
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
        Schema::dropIfExists('pages');
    }
}
