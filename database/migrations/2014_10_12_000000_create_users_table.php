<?php

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
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('type', ['admin', 'teacher', 'student', 'user'])->default('user');
            $table->string('email')->unique();
            $table->enum('status', ['active', 'inactive', 'uncomfirmed'])->default('uncomfirmed');
            $table->string('password', 60);
            $table->rememberToken();
            $table->string('confirmation_code', 40);
            $table->timestamps();
            $table->unique(['first_name', 'last_name'], 'fullname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
