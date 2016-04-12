<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->enum('status', config('college.statuses'))->default('inactive');
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('news_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('news_id')->unsigned();
            $table->string('title');
            $table->text('text');
            $table->string('locale')->index();

            $table->unique(['news_id','locale']);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
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
        Schema::drop('news');
        Schema::drop('news_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
