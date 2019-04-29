<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('username')->unique();
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->string('role')->default('User');
        $table->string('provider')->default('Web');
        $table->string('document')->nullable();
        $table->string('country')->nullable();
        $table->string('city')->nullable();
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->date('birthdate')->nullable();
        $table->string('avatar')->nullable();
        $table->integer('points')->default(0);
        $table->float('rank')->default(0);
        $table->string('domains')->nullable();
        $table->boolean('subscribed')->default(true);
        $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
