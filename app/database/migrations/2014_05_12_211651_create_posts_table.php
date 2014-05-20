<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function ($table){

            $table->increments('id');
            $table->string('title', 255);
            $table->text('body');
            $table->string('slug')->nullable();
            $table->integer('category_id');
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image');
            $table->timestamps();
            $table->boolean('is_published')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }

}
