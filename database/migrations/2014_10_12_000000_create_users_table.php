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
            $table->string('slug');
            $table->enum('type', ['admin', 'teacher', 'student', 'user'])->default('user');
            $table->string('email')->unique();
            $table->enum('status', ['active', 'inactive', 'uncomfirmed'])->default('uncomfirmed');
            $table->string('avatar');
            $table->date('birth_date');
            $table->string('phone', 20);
            $table->string('fb', 20);
            $table->string('twitter', 20);
            $table->string('instagram', 20);
            $table->string('gplus', 20);
            $table->string('password', 60);
            $table->rememberToken();
            $table->string('confirmation_code', 40);
            $table->timestamps();
            $table->unique(['first_name', 'last_name'], 'fullname');
        });

        Schema::create('user_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('education');
            $table->string('job');
            $table->text('bio');
            $table->string('locale')->index();

            $table->unique(['user_id','locale']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('users');
        Schema::drop('user_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
