<?php

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
            $table->string('slug')->unique();
            $table->enum('status', config('college.statuses'))->default('inactive');
            $table->timestamps();
        });
        
        Schema::create('page_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('title');
            $table->text('content');
            $table->string('locale')->index();

            $table->unique(['page_id','locale']);
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
        Schema::drop('pages');
        Schema::drop('page_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    }
}
