<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_meta', function (Blueprint $table) {
            $table->increments('id');
    
            $table->integer('post_id')->unsigned();
            //$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
    
            $table->string('type')->nullable();
    
            $table->string('key')->index();
            $table->text('value')->nullable();
    
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
        Schema::dropIfExists('posts_meta');
    }
}
