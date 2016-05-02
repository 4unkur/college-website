<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique()->index();
            $table->enum('status', config('college.statuses'))->default('inactive');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('video');
            $table->string('files');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
        
        Schema::create('video_course_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_course_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('locale')->index();

            $table->unique(['video_course_id','locale']);
            $table->foreign('video_course_id')->references('id')->on('video_courses')->onDelete('cascade');
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
        Schema::drop('video_courses');
        Schema::drop('video_course_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
