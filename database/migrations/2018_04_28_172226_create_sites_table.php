<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sites', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('domain')->unique();
        $table->string('tagline')->nullable();
        $table->string('logo')->nullable();
        $table->text('head')->nullable();
        $table->text('footer')->nullable();
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
        Schema::dropIfExists('sites');
    }
}
