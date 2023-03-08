<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('author_id')->unsigned();
            $table->string('base_path');
            $table->string('original_name');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_size');
            $table->string('dimensions');
            $table->string('mime_type');
            $table->string('page_type')->default('posts');
            $table->integer('post_id')->default(0);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('media');
    }
}
