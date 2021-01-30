<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_id')->index();
            $table->bigInteger('author_id')->index();
            $table->string('name', 128)->unique();
            $table->string('title', 128);
            $table->string('image', 255)->nullable();
            $table->string('meta_title', 255);
            $table->string('meta_description', 255);
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->text('status')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
